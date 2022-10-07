<x-layout>

    <form action="/series/store" method="post">
        @csrf
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</x-layout>