@foreach ($pelanggan as $item)
    <tr class="border-b">
        <td class="px-6 py-4">{{ $item->nama }}</td>
        <td class="px-6 py-4">{{ $item->no_handphone }}</td>
        <td class="px-6 py-4">
            @if ($item->statusKode && ($item->statusKode->id_status_kode == 2 || $item->statusKode->id_status_kode == 3))
                <div class="inline-block px-4 py-2 text-white rounded-md 
                    {{ $item->statusKode->id_status_kode == 2 ? 'bg-green-500' : 'bg-gray-500' }}">
                    {{ $item->kode_ref }}
                </div>
            @endif
        </td>
        <td class="px-6 py-4">{{ $item->statusKode->nama_status ?? 'N/A' }}</td>
    </tr>
@endforeach

{{-- Pagination Links --}}
<tr>
    <td colspan="4" class="px-6 py-4 text-center">
        {{ $pelanggan->appends(request()->query())->links('pagination::tailwind') }}
    </td>
</tr>
