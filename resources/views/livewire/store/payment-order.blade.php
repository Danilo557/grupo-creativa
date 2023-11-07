<div>
   
        <div class="container py-8 mx-auto">
            <div class="grid md:grid-cols-5 grid-cols-1 gap-4">
                <div class="md:col-span-3">
                    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                        <p class="text-gray-700 uppercase">
                            Número de orden:
                            <span class="font-semibold">{{ $order->id }}</span>
                        </p>
                    </div>
    
                    <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                        <div class="grid grid-cols-2 gap-6 text-gray-600 ">
                            <div>
                                <p class="text-lg uppercase font-semibold">Envio</p>
                                @if ($order->envio_type == 1)
                                    <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                                    <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                                @else
                                    <p class="text-sm">Los productos seran enviados a</p>
    
                                    <p class="text-sm">{{ $envio->address }}</p>
                                    <p class="text-sm">{{ $envio->references }}</p>
                                    <p class="text-sm">{{ $envio->state->name }}</p>
                                    <p class="text-sm">{{ $envio->municipality->name }}</p>
                                @endif
                            </div>
                            <div>
                                <p class="text-lg uppercase font-semibold">Datos de contacto: </p>
                                <p class="text-sm">Persona que recibira el producto: {{ $order->contact }}</p>
                                <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
    
                            </div>
                        </div>
                    </div>
    
    
                    <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 text-gray-700">
                        <p class="text-xl font-semibold mb-4">Resumen</p>
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-500">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>
                                            <div class="flex">
                                                <img class="h-15 w-20 object-cover object-center mr-4"
                                                    src="{{ Storage::url($item->options->image) }}">
                                                <article>
                                                    <h1 class="font-bold">{{ $item->name }}</h1>
                                                    <div class="flex text-xs">
                                                        Color: {{ __($item->options->color) }}
                                                        - {{ $item->options->size }}
                                                    </div>
                                                </article>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ Currency::currency('USD')->format($item->price) }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item->qty }}
                                        </td>
                                        <td class="text-center">
                                            {{ Currency::currency('USD')->format($item->qty * $item->price) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
    
                        </table>
                    </div>
                </div>
    
                <div class="md:col-span-2">
                    
                    <div
                        class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 text-gray-700">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <img width="200px" height="200px"
                                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fclipground.com%2Fimages%2Fvisa-mastercard-clipart-8.jpg&f=1&nofb=1&ipt=b60e8db2255ed1369cbe7133521e3940aaeb759acd34aad8bc06c2d0835985e3&ipo=images"
                                    alt="">
                            </div>
    
                            <div class="text-gray-700 font-semibold">
                                <p class="text-sm">
                                    Subtotal: {{ Currency::currency('USD')->format($order->total - $order->shipping_cost) }}
                                </p>
                                <p class="text-sm">
                                    Envio: {{ Currency::currency('USD')->format($order->shipping_cost) }}
                                </p>
                                <p class="text-lg">
                                    Pago:{{ Currency::currency('USD')->format($order->total) }}
                                </p>
        
                            </div>
    
                           
                        </div>
    
                        <div class="grid grid-cols-1 gap-4 mt-5">
                            <div id="paypal-button-container" class=""></div>
                        </div>
                        
    
                        
    
                       
                    </div>
                    
                    
                </div>
            </div>
    
    
    
        </div>
    
    
        @push('js')
            {{-- Replace "test" with your own sandbox Business account app client ID --}}
            <script  src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}&currency=MXN"></script>
            <script>
               
                paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '0.01' // Can also reference a variable or function
                                }
                            }]
                        });
                    },
                    // Finalize the transaction after payer approval
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            // Successful capture! For dev/demo purposes:
                            
                            Livewire.emit('payOrder');

                            //console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                            //const transaction = orderData.purchase_units[0].payments.captures[0];
                            // alert(
                            //     `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                            //     );
                            // When ready to go live, remove the alert and show a success message within this page. For example:
                            // const element = document.getElementById('paypal-button-container');
                            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                            // Or go to another URL:  actions.redirect('thank_you.html');
                        });
                    }
                }).render('#paypal-button-container');
               
               
            </script>
        @endpush
    
    
</div>
