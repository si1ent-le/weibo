<a href="{{ route('users.show',$user->id) }}">
  <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="gravatar"/>
</a>
<h2>{{ $user->name }}</h2>
