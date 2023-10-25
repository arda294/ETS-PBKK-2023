<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    *{
        font-family: 'Poppins', sans-serif;
    }
</style>
<body class="bg-green-300">
    <div class="flex flex-col p-10 h-screen">
        <form action="{{url('records/create')}}" class="flex flex-col gap-2 bg-white rounded-md p-5 drop-shadow-2xl w-5/6 self-center mt-auto mb-auto text-sm mb-1/2 sm:w-[600px] sm:text-lg" method="post" enctype="multipart/form-data" novalidate>
            @csrf
                <h1 class="text-center text-xl sm:text-2xl sm:m-4 font-bold">Add Medical Record</h1>

                <label for="patient_id">Patient</label>
                <select id="patient_id" class="rounded-md ring-gray-500 ring-2 p-2 bg-gray-100 drop-shadow-lg mb-4" name="patient_id">
                    <option value="">Select Patient</option>
                @foreach ($patients as $patient)
                    <option value="{{$patient->id}}" {{old('patient_id') == $patient->id ? 'selected' : ''}}>{{$patient->name}}</option>
                @endforeach
                </select>
                @error('patient_id')
                    <h5 class="text-red-400 font-thin text-sm mt-[-1rem]">{{ $message }}</h5>
                @enderror

                <label for="doctor_id">Doctor</label>
                <select id="doctor_id" class="rounded-md ring-gray-500 ring-2 p-2 bg-gray-100 drop-shadow-lg mb-4" name="doctor_id">
                    <option value="">Select doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{$doctor->id}}" {{old('doctor_id') == $doctor->id ? 'selected' : ''}}>{{$doctor->name}}</option>
                @endforeach
                </select>
                @error('doctor_id')
                    <h5 class="text-red-400 font-thin text-sm mt-[-1rem]">{{ $message }}</h5>
                @enderror
                
                <label for="health_condition">Health Condition</label>
                <textarea type="text" rows="6" name="health_condition" class="rounded-md ring-gray-500 ring-2 p-2 bg-gray-100 drop-shadow-lg mb-4" id="health_condition">{{old('health_condition')}}</textarea> 
                @error('health_condition')
                    <h5 class="text-red-400 font-thin text-sm mt-[-1rem]">{{ $message }}</h5>
                @enderror

                <label for="temperature">Temperature</label>
                <input type="number" class="rounded-md ring-gray-500 ring-2 p-2 bg-gray-100 drop-shadow-lg mb-4" name="temperature" min="35.0" max="45.5" step="0.01" value="{{ old('sussiness') ?? '35'}}"  id="temperature"
                    onchange="if(Number(this.value) > this.max) this.value = this.max;if(Number(this.value) < this.min) this.value = this.min ; this.nextElementSibling.value = Number(this.value)"
                >
                <input type="range" class="h-10" min="35.0" max="45.5" step="0.01" value="{{old('sussiness') ?? '35'}}" id="temperature_slider"
                    oninput="this.previousElementSibling.value = Number(this.value)"
                >

                <label for="prescription_img">Image of Prescription</label>
                <input type="file" accept="image/*" class="rounded-md ring-2 ring-gray-500 p-1" name="prescription_img" id="prescription_img">
                @error('prescription_img')
                    <h5 class="text-red-400 font-thin text-sm">{{ $message }}</h5>
                @enderror
                <input type="submit" class="bg-black rounded-md text-white w-1/2 h-10 self-center mt-5" value="Submit">
        </form>
    </div>
</body>
</html>