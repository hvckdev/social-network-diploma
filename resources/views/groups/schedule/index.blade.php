<x-app-layout>
    @foreach($schedule->weeks as $week => $days)
        <x-content.table>
            <x-slot name="name">
                <h5>Week {{ $week + 1}} </h5>
            </x-slot>
            <x-slot name="head">
                <th>#</th>
                @foreach($days->days as $number => $lessons)
                    <th>lesson {{ $number + 1 }}</th>
                @endforeach
            </x-slot>
            <x-slot name="body">
                @foreach($days->days as $day => $lessons)
                    <tr>
                        <th>{{ $ulSTUApiService->daysOfWeek[$day] }}</th>
                        @foreach($lessons->lessons as $lesson)
                            <td>
                                <p>{{ $lesson[0]->nameOfLesson ?? '' }}</p>
                                <p>{{ $lesson[0]->teacher ?? '' }}</p>
                                <p>{{ $lesson[0]->room ?? '' }}</p>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </x-slot>
        </x-content.table>
    @endforeach
</x-app-layout>
