<div class="card table-responsive-sm">
    <table class="table table-sm table-hover">
        <thead>
            <tr>
                <th class="text-center">{{ __('app.table_no') }}</th>
                <th class="col-1">{{ __('time.day_name') }}</th>
                <th class="text-center col-2">{{ __('time.date') }}</th>
                <th class="col-4">{{ __('lecturing.description') }}</th>
                <th class="col-3">{{ __('lecturing.lecturer_name') }}</th>
                <th class="col-3">{{ __('lecturing.title') }}</th>
                <th class="col-3">{{ __('lecturing.book_link') }}</th>
                <th class="text-center col-3">{{ __('app.action') }}</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($lecturings[$audienceCode]))
                @foreach($lecturings[$audienceCode] as $key => $lecturing)
                <tr>
                    <td class="text-center">{{ 1 + $key }}</td>
                    <td>{{ $lecturing->day_name }}</td>
                    <td class="text-center">{{ $lecturing->full_date }}</td>
                    <td>{{ $lecturing->description ?? ''}}</td>
                    <td>{{ $lecturing->lecturer_name }}</td>
                    <td>{{ $lecturing->title }}</td>
                    <td>{{ $lecturing->book_link }}</td>
                    <td class="text-center">
                        @can('view', $lecturing)
                            {{ link_to_route(
                                'lecturings.show',
                                __('app.show'),
                                [$lecturing],
                                ['id' => 'show-lecturing-' . $lecturing->id]
                            ) }}
                        @endcan
                    </td>
                </tr>
                @endforeach
            @else
                <tr><td colspan="7">{{ __('lecturing.muslimah_empty') }}</td></tr>
            @endif
        </tbody>
    </table>
</div>
