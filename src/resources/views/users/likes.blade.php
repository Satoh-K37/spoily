@extends('app')

@section('title', $user->name . 'のいいねしたレシピ')

@section('content')
  <div class="container">
    
    @include('users.user')
    @include('users.tabs', ['hasRecipes' => false, 'hasLikes' => true])
      @foreach($recipes as $recipe)
        @include('recipes.card')
      @endforeach

    <div class="container">
      {{ $recipes->links() }}
    </div>
  </div>
@endsection
