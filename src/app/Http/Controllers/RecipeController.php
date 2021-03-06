<?php


namespace App\Http\Controllers;

use Illuminate\Http\File;
use App\Http\Requests\RecipeRequest;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as InterventionImage;
use Illuminate\Support\Facades\Storage as Storage;
use App\User;
use App\Recipe;
use App\Tag;
use App\Category;
use App\Comment;

class RecipeController extends Controller
{
  public function __construct()
  {
      $this->authorizeResource(Recipe::class, 'recipe');
  }

  public function index(Request $request)
  {
      $category = new Category;
      $categories = $category->getCategories()->prepend('選択してください', '');
      $keyword = $request->input('keyword');
      $category_id = $request->input('category_id');
      $query = Recipe::query();
      // $recipes = $query->orderBy('created_at','desc')->paginate();
      $recipes = $query->orderByDesc('created_at')->paginate();
      $recipes->loadMissing('user','likes','tags');
      
      // $user = User::where('name', $recipe->user->name)->first();
      // ->load('user');
      // dd(\DB::getQueryLog());
      return view('recipes.index', [
        'recipes' => $recipes,
        // 'user' => $user,
        // 'allcategory_names' => $allCategoryNames,
        'categories' => $categories,
        'keyword' => $keyword,
        'category_id' => $category_id,
        ]);
  }

  // 検索
  public function search(Request $request)
  {
    // 検索フォームに入力されたキーワードを受け取る
    $keyword = $request->input('keyword');
    // 検索時に選択されたcategory_idを受け取る
    $category_id = $request->input('category_id');
    $query = Recipe::query();

    #もしキーワードが存在している場合は処理を行う
    if(!empty($keyword))
    {
      // recipeタイトルと本文にフォームに入力されたキーワードと部分一致するものがあれば取得する
      $query->where('recipe_title','like','%'. $keyword .'%')
      ->orWhere('content','like','%'. $keyword .'%')->paginate();
    }
    // カテゴリーのIDが存在している場合に処理を行う。
    if(!empty($category_id)){
      $query->whereHas('categories', function ($query) use ($category_id) {
        $query->where('categories.id', $category_id);
      })->paginate();
    }

    // $keywordがない場合は全検索を実行する
    $result_recipes = $query->orderBy('created_at','desc')->paginate();
    $result_recipes->loadMissing('user','likes','tags');
    
    $category = new Category;
    $categories = $category->getCategories()->prepend('選択してください', '');
    
    $old_category_id = $category_id;

    return view('recipes.search_result', [
      'result_recipes' => $result_recipes,
      'keyword' => $keyword,
      'categories' => $categories,
      'category_id' => $category_id,
      'old_category_id' => $old_category_id,
      ]);
  }

  public function show(Recipe $recipe)
  {
      $user = User::where('name', $recipe->user->name)->first();
      
      // dd($user);
      return view('recipes.show', [
        'recipe' => $recipe,
        'user' => $user,
        ]);
  }

  public function create()
  {
      $allTagNames = Tag::all()->map(function ($tag) {
          return ['text' => $tag->name];
      });
      
      $allCategoryNames = Category::all();
      $category = new Category;
      $categories = $category->getCategories()->prepend('選択してください', '');
      
      $servings = config('serving');
      $cooking_times = config('cookingtime');

      return view('recipes.create', [
          'allTagNames' => $allTagNames,
          'allCategoryNames' => $allCategoryNames,
          'categories' => $categories,
          'servings' => $servings,
          'cooking_times'=> $cooking_times
      ]);

  }

  public function store(RecipeRequest $request, Recipe $recipe)
  {
      //リクエストデータを受け取る
      $form = $request->all();
      // unset($form['_token']);
      // 画像データがあるかを確認
      if(isset($form['image_path'])){
        // 変数fileにrequestから画像の情報を取得し、代入
        $file = $request->file('image_path');
        // ユニークなIDとランダム関数を使ってランダムな文字列を作成
        $file_name = uniqid(rand(). '_');
        // 拡張子を取得
        $extension = $file->extension();
        // $file_nameと$extensionを使い、ユニークなファイル名を作成
        $filename_to_store = $file_name.".".$extension;

        // フォームから受け取った画像をリサイズする
        $resized_image = InterventionImage::make($file)
          ->fit(860, 532, // アスペクト比1:1.618 黄金比
            function ($constraint) {
            // 縦横比を保持したままにする
            $constraint->aspectRatio();
            // 小さい画像は大きくしない
            $constraint->upsize();
          }
        )->encode();

        // ローカルでの処理
        if(app()->isLocal() || app()->runningUnitTests()){
          // $form['image_path']にユニークなファイル名を代入する
          $form['image_path'] = $filename_to_store;
          // ファイルディレクトリに保存する処理。
          Storage::put('public/images/'. $filename_to_store, $resized_image);
        }
        // 本番環境での処理
        else{
          // ユニークなファイル名をimage_pathカラムに代入
          $form['image_path'] = 'public/images/'. $filename_to_store;
          // S3にリサイズした画像をオリジナルのファイル名でアップロードする
          Storage::disk('s3')->put('public/images/'.$filename_to_store, $resized_image);
        }
      }
      
      $recipe->user_id = $request->user()->id;
      $recipe->fill($form)->save();
      // 二重送信対策
      $request->session()->regenerateToken();

      // カテゴリーを追加
      $recipe->categories()->attach($request->category_id);
      $request->tags->each(function ($tagName) use ($recipe) {
        $tag = Tag::firstOrCreate(['name' => $tagName]);
        $recipe->tags()->attach($tag);
      });

      $request->session()->regenerateToken();
      return redirect()->route('recipes.index')->with('flash_message', 'レシピの投稿が完了しました');
  }

  public function edit(Recipe $recipe)
  {
      $tagNames = $recipe->tags->map(function ($tag) {
          return ['text' => $tag->name];
      });

      $allTagNames = Tag::all()->map(function ($tag) {
        return ['text' => $tag->name];
      });

      $allCategoryNames = Category::all();
      
      $category = new Category;
      $categories = $category->getCategories();
      // category_idを取得する
      $old_category_id = Recipe::find($recipe->id)->categories()->where('recipe_id', '=', $recipe->id)->first();

      $servings = config('serving');
      $cooking_times = config('cookingtime');
      

      return view('recipes.edit', [
        'recipe' => $recipe,
        'tagNames' => $tagNames,
        'allTagNames' => $allTagNames,
        'allCategoryNames' => $allCategoryNames,
        // 'inputCategory' => $inputCategory,
        'categories' => $categories,
        'old_category_id' => $old_category_id,
        'servings' => $servings,
        'cooking_times' => $cooking_times,
      ]);
  }

  public function update(RecipeRequest $request, Recipe $recipe)
  {
      // リクエストデータを受け取る
      $form = $request->all();
      // 画像データがあるかを確認
      if(isset($form['image_path'])){
        // // 削除する画像名を取得
        $file = $request->image_path;

        // 削除する画像名を取得
        $delete_image = $recipe->image_path;

        $resized_image = InterventionImage::make($file)
          // ->resize(null, 532,
          ->fit(860, 532, // アスペクト比1:1.618 黄金比 横×縦
            function ($constraint) {
            // 縦横比を保持したままにする
            $constraint->aspectRatio();
            // 小さい画像は大きくしない
            $constraint->upsize();
          }
        )->encode();
        
        // ユニークIDとランダム関数を使ってランダムな文字列を作成
        $file_name = uniqid(rand(). '_');
        // 拡張子を取得
        $extension = $file->extension();
        // $fileNameと$extensionを使い、オリジナルのファイル名を作成
        $filename_to_store = $file_name.".".$extension;

        // ローカルでの処理
        if(app()->isLocal() || app()->runningUnitTests()){
          // 削除する画像が存在しているディレクトリのパスを取得
          $delete_path = storage_path().'/app/public/images/'.$delete_image;
          // $delete_pathに入っている画像パスと一致する画像データを削除
          \File::delete($delete_path);
          // 変数fileにrequestから画像の情報を取得し、代入
          // $form['image_path']にユニークなファイル名を代入する
          $form['image_path'] = $filename_to_store;
          // ファイルディレクトリに保存する処理。
          Storage::put('public/images/'. $filename_to_store, $resized_image);
        }else {
          // 削除する画像が存在しているディレクトリのパスを取得
          Storage::disk('s3')->delete($delete_image);
          // ユニークなファイル名をimage_pathカラムに代入
          $form['image_path'] = 'public/images/'. $filename_to_store;
          // S3にリサイズした画像をオリジナルのファイル名でアップロードする
          Storage::disk('s3')->put('public/images/'. $filename_to_store, $resized_image);
        }
      }

      $recipe->user_id = $request->user()->id;
      $recipe->fill($form)->save();

      $recipe->categories()->sync($request->category_id);

      $recipe->tags()->detach();
      $request->tags->each(function ($tagName) use ($recipe) {
          $tag = Tag::firstOrCreate(['name' => $tagName]);
          $recipe->tags()->attach($tag);
      });

      // session()->flash('toastr', config('toastr.save'));
      session()->flash('flash_message', 'レシピの編集が完了しました');
      return redirect()->route('recipes.index');
      // ->with('flash_message', 'レシピの編集が完了しました');
  }

  public function destroy(Recipe $recipe)
  {
    if(app()->isLocal() || app()->runningUnitTests()){
      // 削除する画像名を取得
      $delete_image = $recipe->image_path;
      
      // 削除する画像が存在しているディレクトリのパスを取得
      $delete_path = storage_path().'/app/public/images/'.$delete_image;
      // $delete_pathに入っている画像パスと一致する画像データを削除
      \File::delete($delete_path);
    }else{
      // 本番環境での処理
      // 削除する画像名を取得
      $delete_image = $recipe->image_path;
      // 削除する画像が存在しているディレクトリのパスを取得
      Storage::disk('s3')->delete($delete_image);
    }
    
    $recipe->delete();

    return redirect()->route('recipes.index')->with('flash_message', 'レシピの削除が完了しました');
  }


  public function like(Request $request, Recipe $recipe)
  {
      // レシピモデルと、リクエストを送信したユーザーのユーザーモデルの両者を紐づけるlikesテーブルのレコードが削除される
      // 先にdetachする理由は重複していいねをしてしまうことを回避するために先に削除してから新規登録を行う。
      $recipe->likes()->detach($request->user()->id);
      // レシピモデルと、リクエストを送信したユーザーのユーザーモデルの両者を紐づけるlikesテーブルのレコードが新規登録される
      $recipe->likes()->attach($request->user()->id);

      return [
          'id' => $recipe->id,
          'countLikes' => $recipe->count_likes,
      ];
  }

  public function unlike(Request $request, Recipe $recipe)
  {
      $recipe->likes()->detach($request->user()->id);

      return [
          'id' => $recipe->id,
          'countLikes' => $recipe->count_likes,
      ];
  }

  // static として宣言することで、 クラスのインスタンス化の必要なしにアクセスすることができるようになる
  // static プロパティは、矢印演算子 -> によりオブジェクトからアクセス することはできないらしい

  //「\\」「%」「_」などの記号を文字としてエスケープさせる
  // セキュリティに必要らしいんだけどイマイチ理解できないので一旦コメントアウトしておく。
  // $query->where('recipe_title','like','%'. $keyword .'%')これでエスケープできてるっぽい
  //参照：https://qiita.com/horikeso/items/393663f1bffe63bd937e
  // public static function escapeLike($str)
  // {
  //     return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
  // }

}


