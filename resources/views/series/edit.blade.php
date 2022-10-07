<x-layout>

    <form action="/series/update/{{$serie->id}}" method="post">
        @csrf
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" @isset($serie->nome) value="{{$serie->nome}}"@endisset>
            
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</x-layout>