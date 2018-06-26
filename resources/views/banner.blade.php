<div class="mb-4 destiny-banner" style="background :url('{{route('profile.banner',$user)}}'); ">
    <div class="container d-flex">
        <img class="destiny-avatar align-self-center" src="{{route('profile.avatar', $user)}}" alt="Avatar" style="border-color: {{$user->avatar_hex}}"/>
        <h1 class="text-white align-self-center ml-2" style="background-color: {{$user->avatar_hex}}">Morgan</h1>
    </div>
</div>