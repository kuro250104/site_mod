@foreach($valid_hours as $valid_hour)
    <tr>
        <td><a href="{{ route('validated_hour.edit', $valid_hour->id) }}" class="btn btn-light btn-icon-split" spellcheck="false">
                <span class="icon text-gray-600">
                    <i class="far fa-edit"></i>
                </span>
                <span class="text">Modifier</span>
            </a></td>
        <td>{{ $valid_hour->id }}</td>
        <td>{{ $valid_hour->date }}</td>
        <td>{{ $valid_hour->hour->name }}</td>
        <td>{{ $valid_hour->user->name ?? 'N/A' }}</td>
        <td>{{ $valid_hour->user->team->name ?? 'N/A' }}</td>
        <td>{{ $valid_hour->timer_one ?? '' }}</td>
        <td>{{ $valid_hour->taskOne->name ?? '' }}</td>
        <td>{{ $valid_hour->subtaskOne->name ?? '' }}</td>
        <td>{{ $valid_hour->number_one ?? '' }}</td>
        <td>{{ $valid_hour->projectOne->name ?? '' }}</td>
        <td>{{ $valid_hour->stageOne->name ?? '' }}</td>
        <td>{{ $valid_hour->coment_one ?? '' }}</td>
        <td>{{ $valid_hour->timer_two ?? '' }}</td>
        <td>{{ $valid_hour->taskTwo->name ?? '' }}</td>
        <td>{{ $valid_hour->subtaskTwo->name ?? '' }}</td>
        <td>{{ $valid_hour->number_two ?? '' }}</td>
        <td>{{ $valid_hour->projectTwo->name ?? '' }}</td>
        <td>{{ $valid_hour->stageTwo->name ?? '' }}</td>
        <td>{{ $valid_hour->coment_two ?? '' }}</td>
        <td>{{ $valid_hour->timer_three ?? '' }}</td>
        <td>{{ $valid_hour->taskThree->name ?? '' }}</td>
        <td>{{ $valid_hour->subtaskThree->name ?? '' }}</td>
        <td>{{ $valid_hour->number_three ?? '' }}</td>
        <td>{{ $valid_hour->projectThree->name ?? '' }}</td>
        <td>{{ $valid_hour->stageThree->name ?? '' }}</td>
        <td>{{ $valid_hour->coment_three ?? '' }}</td>
        <td>{{ $valid_hour->timer_four ?? '' }}</td>
        <td>{{ $valid_hour->taskFour->name ?? '' }}</td>
        <td>{{ $valid_hour->subtaskFour->name ?? '' }}</td>
        <td>{{ $valid_hour->number_four ?? '' }}</td>
        <td>{{ $valid_hour->projectFour->name ?? '' }}</td>
        <td>{{ $valid_hour->stageFour->name ?? '' }}</td>
        <td>{{ $valid_hour->coment_four ?? '' }}</td>
    </tr>
@endforeach
