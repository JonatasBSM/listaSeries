<x-layout>

    <ul class="list-group d-flex flex-column">

    

        @foreach ($seasons as $season)
        
            <li class="list-group-item d-flex flex-row justify-content-between">
                Temporada {{ $season->number }}
                <span class="badge bg-secondary">
                   {{$season->episodes->count()}}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>