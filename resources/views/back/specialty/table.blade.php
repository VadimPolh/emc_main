	@foreach ($specialty as $item)
		<tr>
			<td class="text-primary"><strong>{{ $item->specialty_id }}</strong></td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->chief }}<td>
		</tr>
	@endforeachучше