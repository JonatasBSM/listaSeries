<x-layout>
    <a href="/series/create" class="btn btn-dark mb-2">Adicionar nova série</a>

    @isset($mensagemSucesso) 
        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    
    @endisset


    <ul class="list-group d-flex flex-column">

    

        @foreach ($series as $serie)
        
            <li class="list-group-item d-flex flex-row justify-content-between">
                {{ $serie->nome }} 
                <div class="d-flex flex-row">
                    <a href="/series/edit/{{$serie->id}}" class="btn btn-primary">Alterar</a>
                    <form action="/series/destroy/{{$serie->id}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</x-layout>