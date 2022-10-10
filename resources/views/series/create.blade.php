<x-layout>

    <form action="/series/store" method="post">
        @csrf
        <div class="row">

            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>
            <div class="col-2">
                <label for="Temporadas" class="form-label">Temporadas:</label>
                <input type="text" id="Temporadas" name="Temporadas" class="form-control">
            </div>
            <div class="col-2">
                <label for="Episodios" class="form-label">Episodios:</label>
                <input type="text" id="Episodios" name="Episodios" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>


    </form>
</x-layout>