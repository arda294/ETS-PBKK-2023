@extends('app-layout')

@section('main')
<div class="flex flex-col gap-3 p-4 min-h-full w-full  bg-slate-200">
    <h1 class="text-2xl font-extrabold">Medical Records List</h1>
    @if ($message = session('success'))
        <span class="flex flex-row bg-green-200 rounded-md ring-1 ring-green-900 text-green-900 p-4" onclick="">
            {{ $message }} <button class="ml-auto font-extrabold" onclick="this.parentNode.remove()">X</button>
        </span>
    @endif
    
    <a href="{{url('records/create')}}" class="text-2xl font-extrabold bg-green-500 rounded-md p-2">Add</a>
    <ul class="flex flex-col gap-4 flex-1 bg-green-300 rounded-xl p-4">
        @foreach ($patients as $patient)
        <li class="flex bg-green-500 rounded-xl p-2 drop-shadow-lg font-bold">
            <p>{{$patient->name}}</p>
            <a href="{{url('records?' . 'patient=' . $patient->id)}}" class="p-2 bg-green-800 rounded-md ml-auto">View Records</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection