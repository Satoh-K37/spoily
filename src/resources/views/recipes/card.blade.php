
<div class="card mt-3">
  <div class="card-body d-flex flex-row">
    <a href="{{ route('users.show', ['name' => $recipe->user->name]) }}" class="text-dark">
      <i class="fas fa-user-circle fa-3x mr-1"></i>
    </a>
    <div>
      <div class="font-weight-bold">
        <a href="{{ route('users.show', ['name' => $recipe->user->name]) }}" class="text-dark">
          {{ $recipe->user->name }}
        </a>
      </div>
      <div class="font-weight-lighter">
        {{ $recipe->created_at->format('Y/m/d H:i') }}
      </div>
    </div>

  @if( Auth::id() === $recipe->user_id )
    <!-- dropdown -->
      <div class="ml-auto card-text">
        <div class="dropdown">
          <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route("recipes.edit", ['recipe' => $recipe]) }}">
              <i class="fas fa-pen mr-1"></i>レシピを更新する
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $recipe->id }}">
              <i class="fas fa-trash-alt mr-1"></i>レシピを削除する
            </a>
          </div>
        </div>
      </div>
      <!-- dropdown -->

      <!-- modal -->
      <div id="modal-delete-{{ $recipe->id }}" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ route('recipes.destroy', ['recipe' => $recipe]) }}">
              @csrf
              @method('DELETE')
              <div class="modal-body">
                {{ $recipe->recipe_title }}を削除します。よろしいですか？
              </div>
              <div class="modal-footer justify-content-between">
                <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                <button type="submit" class="btn btn-danger">削除する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- modal -->
    @endif

  </div>
  <div class="card-body pt-0">
    <h3 class="h4 card-title">
      <a class="text-dark" href="{{ route('recipes.show', ['recipe' => $recipe]) }}">
        {{ $recipe->recipe_title }}
      </a>
    </h3>
    <div class="card-text">
      {{ $recipe->content }}
    </div>

    <div class="card-text">
      @if(file_exists(public_path().'/storage/images/'. $recipe->id .'.jpg'))
          <img src="/storage/image_path/{{ $recipe->id }}.jpg" alt="" width="300px" height="200px">
      @elseif(file_exists(public_path().'/storage/images/'. $recipe->id .'.jpeg'))
          <img src="/storage/image_path/{{ $recipe->id }}.jpeg" alt="" width="300px" height="200px">
      @elseif(file_exists(public_path().'/storage/images/'. $recipe->id .'.png'))
          <img src="/storage/image_path/{{ $recipe->id }}.png" alt="" width="300px" height="200px">
      @elseif(file_exists(public_path().'/storage/images/'. $recipe->id .'.gif'))
          <img src="/storage/image_path/{{ $recipe->id }}.gif" alt="" width="300px" height="200px">
      @endif
    </div>

    <!-- ここから先はSHowでのみ表示させるようにしたい -->
    <div class="card-text">
      {{ $recipe->serving }}
    </div>
    <div class="card-text">
      {{ $recipe->ingredient }}
    </div>
    <div class="card-text">
      {{ $recipe->seasoning }}人前
    </div>
    <div class="card-text">
      {{ $recipe->step_content }}
    </div>
    <div class="card-text">
      {{ $recipe->step_content2 }}
    </div>
    <div class="card-text">
      {{ $recipe->step_content3 }}
    </div>
    <div class="card-text">
      {{ $recipe->step_content4 }}
    </div>
    <div class="card-text">
      {{ $recipe->step_content5 }}
    </div>
    <div class="card-text">
      {{ $recipe->step_content6 }}
    </div>
    <div class="card-text">
      {{ $recipe->cooking_point }}
    </div>
    

    <div class="card-body pt-0 pb-2 pl-3">
      <div class="card-text">
        <recipe-like
          :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
          :initial-count-likes='@json($recipe->count_likes)'
          :authorized='@json(Auth::check())'
          endpoint="{{ route('recipes.like', ['recipe' => $recipe]) }}"
        >
        </recipe-like>
      </div>
    </div>
    @foreach($recipe->tags as $tag)
      @if($loop->first)
        <div class="card-body pt-0 pb-4 pl-3">
          <div class="card-text line-height">
      @endif
          <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
            {{ $tag->hashtag }}
          </a>
      @if($loop->last)
          </div>
        </div>
      @endif
    @endforeach

    @foreach($recipe->categories as $category)
      @if($loop->first)
        <div class="card-body pt-0 pb-4 pl-3">
          <div class="card-text line-height">
      @endif
          {{ $category->name }}
      @if($loop->last)
          </div>
        </div>
      @endif
    @endforeach

    @if($recipe->cooking_time === 5)
      <div class="card-text">
        <p>5分以内</p>
      </div>
    @elseif($recipe->cooking_time === 60)
      <div class="card-text">
        <p>1時間以上</p>
      </div>
    @else
      <div class="card-text">
        {{ $recipe->cooking_time }}分
      </div>
    @endif


  </div>
</div>
