@extends('layouts/app')



@section('content')


<div class="flex items-center justify-center h-screen">
    <div class="w-1/5 text-center content-center rounded-xl shadow-2xl h-1/5">
    <div class="mt-5">
    <h1 class="m-2">Become a premium member</h1>
    <p class="m-2">Get Acces to all of the available content!!!</p>
<form class="m-2" action="{{ route('user.updatePremium', Auth::user()->id)}}" method="post">
    @csrf
    @method('PUT')
    <button class="border-2 border-black rounded-xl p-2" type="submit">Sign me up!!!</button>
</form>
</div>
    </div>
 
</div>

@endsection('content')