    {{-- <div class="card table-responsive-sm">
        <table class="table table-sm table-hover">
            <thead>
                <tr>
                    <th class="text-center">{{ __('app.table_no') }}</th>
                    <th class="col-1">{{ __('time.day_name') }}</th>
                    <th class="text-center col-2">{{ __('time.date') }}</th>
                    <th class="col-1">{{ __('lecturing.time') }}</th>
                    <th class="col-3">{{ __('lecturing.friday_lecturer_name') }}</th>
                    <th class="col-2">{{ __('lecturing.imam_name') }}</th>
                    <th class="col-2">{{ __('lecturing.muadzin_name') }}</th>
                    <th class="text-center col-1">{{ __('app.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($lecturings[$audienceCode]))
                    @foreach($lecturings[$audienceCode] as $key => $lecturing)
                    <tr>
                        <td class="text-center">{{ 1 + $key }}</td>
                        <td>{{ $lecturing->day_name }}</td>
                        <td class="text-center">{{ $lecturing->full_date }}</td>
                        <td>{{ $lecturing->start_time }}</td>
                        <td>{{ $lecturing->lecturer_name }}</td>
                        <td>{{ $lecturing->imam_name }}</td>
                        <td>{{ $lecturing->muadzin_name }}</td>
                        <td class="text-center">
                            @can('view', $lecturing)
                                {{ link_to_route(
                                    'friday_lecturings.show',
                                    __('app.show'),
                                    [$lecturing],
                                    ['id' => 'show-lecturing-' . $lecturing->id]
                                ) }}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr><td colspan="6">{{ __('lecturing.friday_empty') }}</td></tr>
                @endif
            </tbody>
        </table>
    </div> --}}
