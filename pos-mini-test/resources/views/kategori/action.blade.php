<div class="d-flex nowrap">
    <a href="{{ route('kategori.show', ['kategori' => $id]) }}" class="btn btn-sm btn-info mr-2">
        Detail
    </a>
    <a href="{{ route('kategori.edit', ['kategori' => $id]) }}" class="btn btn-sm btn-warning mr-2">
        Edit
    </a>
    <a class="btn btn-sm btn-danger" href="#"
        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $id }}').submit();">
        Hapus
    </a>
    <form id="delete-form-{{ $id }}" action="{{ route('kategori.destroy', ['kategori' => $id]) }}" method="POST"
        class="d-none">
        @csrf
        @method('DELETE')
    </form>
</div>
