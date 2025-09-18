@forelse($orders as $order)
<tr>
    <td>{{ $order->id }}</td>
    <td>{{ $order->customer_name }}</td>
    <td>{{ $order->customer_email }}</td>
    <td>{{ number_format($order->total_price) }}</td>
    <td>
        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" class="d-flex gap-2 justify-content-center">
            @csrf
            <select name="status" class="form-select form-select-sm w-auto">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
            <button class="btn btn-success btn-sm" type="submit">Update</button>
        </form>
    </td>
    <td>
        <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary btn-sm mb-1">View</a>
        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm('Are you sure you want to delete this order?')">
                Delete
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="text-center text-muted">No orders found.</td>
</tr>
@endforelse
