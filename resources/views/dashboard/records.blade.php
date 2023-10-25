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
        @foreach ($records as $record)
        <li class="bg-green-500 rounded-xl p-2 drop-shadow-lg font-bold">
            <h1>Doctor in charge : {{$record->doctor->name}}</h1>
            <h1>Patient : {{$record->patient->name}}</h1>
            <div class="bg-green-300 rounded-md p-4 m-2">
                <h1>Health Condition</h1>
                <p>{{$record->health_condition}}</p>
            </div>
            <div>
                <h1 class="text-center">Prescription Image (click to view full size image)</h1>
                <img src="{{$record->prescription_img}}" class="mx-auto max-h-[300px]" onclick="window.location='{{$record->prescription_img}}'">
            </div>
            
        </li>
        @endforeach
    </ul>
</div>
@endsection