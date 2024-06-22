@extends('layout.main')

@section('title', 'Apple or Cheesecake')

@section('content')
<section class="p-4">
    <section class="text-center">
        <h1 class="text-lg sm:text-xl font-bold text-indigo-600">Today is {{ $dayType }} day!!</h1>
        <img src="{{ asset($dayType === 'Apple Pie' ? '/images/applepie.jpg' : '/images/cheesecake.jpg') }}"
            alt="{{ $dayType }}" class="sm:w-1/3 mx-auto mt-4 mb-4 border-4 border-indigo-300 shadow-lg rounded-lg">

        <div class="flex justify-between items-center mt-4 mb-4">
            <a href="{{ route('home', ['date' => date('Y-m-d', strtotime($date .' -1 day'))]) }}" class="text-blue-500 hover:text-blue-700 px-4 py-2 bg-white border border-indigo-300 shadow-sm rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">&larr; Previous Day</a>
            <span class="text-lg font-bold">{{ date('F j, Y', strtotime($date)) }}</span>
            <a href="{{ route('home', ['date' => date('Y-m-d', strtotime($date .' +1 day'))]) }}" class="text-blue-500 hover:text-blue-700 px-4 py-2 bg-white border border-indigo-300 shadow-sm rounded-lg transition duration-300 ease-in-out transform hover:-translate-y-1">Next Day &rarr;</a>
        </div>

        <div class="flex justify-center space-x-8">
            <div class="w-1/2 bg-white shadow-md rounded-lg p-6">
                <p class="font-bold text-indigo-600">Times to bake an apple pie cheap:</p>
                @if(count($optimalTimes) > 0)
                    <table class="table-auto w-full mx-auto mt-2">
                        <tbody>
                            @foreach (array_chunk($optimalTimes, 2) as $chunk)
                                <tr>
                                    @foreach ($chunk as $time)
                                        <td class="border px-4 py-2 text-gray-700">{{ $time }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>There are no optimal times to bake an apple pie today</p>
                @endif

                <p class="font-bold text-indigo-600 mt-6">Advise to make a cheesecake at these times:</p>
                @if(count($worstTimes) > 0)
                    <table class="table-auto w-full mx-auto mt-2">
                        <tbody>
                            @foreach (array_chunk($worstTimes, 2) as $chunk)
                                <tr>
                                    @foreach ($chunk as $time)
                                        <td class="border px-4 py-2 text-gray-700">{{ $time }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>There are no bad times to bake an apple pie today</p>
                @endif
            </div>

            <div class="w-1/2 bg-white shadow-md rounded-lg p-6">
                <p class="font-bold text-indigo-600">Apple Pie Index (when the price is lower then 10 ):</p>
                <table class="table-auto w-full mx-auto mt-2">
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2 text-gray-700">Total Optimal Times Today:</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $applePieIndex }}</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2 text-gray-700">Total Optimal Times This Month:</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $totalApplePieIndexForMonth }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <section>
            <p class="sm:text-lg mt-6">
                Click <a href="{{ route('detailedpage', ['date' => $date]) }}" class="text-blue-500 hover:text-blue-700">HERE</a> for
                detailed times and prices
            </p>
        </section>
    </section>
</section>
@endsection
