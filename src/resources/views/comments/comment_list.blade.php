@foreach ($recipe->comments as $comment)
  <div class="mb-2">
    <div>
      <div class="font-weight-bold">
        <a href="{{ route('users.show', ['name' => $recipe->user->name]) }}" class="text-dark">
          {{ $comment->user->name  }}
        </a>
      </div>
      <div class="font-weight-lighter">
        {{ $comment->created_at->format('Y/m/d H:i') }}
    </div>
    <div class="card-body pt-0">
      <div class="card-text">
        {{ $comment->comment }}
      </div>
    </div>
    <!-- 削除できるけどコメントごと消える -->
    <!-- @if ($comment->user->id == Auth::user()->id)
      <!-- <form method="POST"  href="/comments/{{ $comment->id }}" >
      @csrf
      {{ method_field('delete') }}
      <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("君は本当に削除するつもりかい？");'>
      </form> -->
    <!-- @endif -->
  </div>


@endforeach
