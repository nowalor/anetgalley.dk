
    <div class="pdf">
        <div>
            <img src="http://165.22.81.169/img/logo.svg"/>
            <div>
                <p><b>Product name: </b>{{ $product->name }}</p>
                <p><b>Invoice number: </b>{{ $invoice->invoice_number }}</p>
                <p><b>Issue date: </b>{{ $order->created_at }}</p>
                <p><b>Due date: </b>{{ $invoice->due_date }}</p>
            </div>
            <hr />
            <div>
                <div style="float: left;">
                    <h4>From:</h4>
                    <p><b>Name: </b>Anette Andersen</p>
                    <p><b>Email: </b>info@skiltebanden.dk</p>
                    <p><b>Phone number: </b>+45 2835 9225</p>
                </div>

                <div style="margin-left: 60px;">
                    <h4>To:</h4>
                    <p><b>Name: </b>{{ $invoice->buyer_name }}</p>
                    <p><b>Email: </b>{{ $invoice->buyer_email }}</p>
                    <p><b>Phone number: </b>{{ $invoice->buyer_phone }}</p>
                </div>
            </div>
            <hr />
            <div style="display: block; width:100%;">
                <h4>Account information</h4>
                <p><b>Country code: </b>DK</p>
                <p><b>Bank code: </b>0040</p>
                <p><b>Account number: </b>0440116243</p>
                <p><b>Iban: </b>DK50 0040 0440 1162 43</p>
            </div>

            <p style="color: gray;">Please include the invoice id as an explanation</p>


        </div>
    </div>


