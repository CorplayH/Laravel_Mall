@extends('homelayout.master')

@section('content')

    <div class="container padding-bottom-3x mb-1" id="myCart" v-cloak="">

        <div v-if="cart.length">
            <!-- Shopping Cart-->
            <div class="table-responsive shopping-cart">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th class="text-center">Unit price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Subtotal</th>
                        <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#" @click.prevent="deleteAll()">Clear
                                Cart</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(v,k) in newCart">
                        <td>
                            <div class="product-item">
                                <a class="product-thumb" href="#"><img :src="v.goods.images[0]" alt="Product"></a>
                                <div class="product-info">
                                    <h4 class="product-title"><a :href="'/product/'+v.goods_id">@{{ v.goods.gname }}</a></h4>
                                    <div class="float-left">
                                    <span v-for="(v,k) in v.attrs.topAttr ">
                                        <em> @{{ v }} :&nbsp</em>
                                    </span>
                                    </div>
                                    <div class="float-left">
                                    <span v-for="(v,k) in v.attrs.attrName ">
                                        <em> @{{ v }} </em>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">$@{{ v.unitPrice}}</td>

                        <td class="text-center">
                            <input id="quantity" class="form-control" type="number" min="1" v-model="v.num" :value="v.num" max="99"
                                   name="quantity" @blur="calc(v)">
                        </td>
                        <td class="text-center text-lg">$@{{ v.subtotal }}</td>
                        <td class="text-center">
                            <a class="remove-from-cart" href="#" @click.prevent="delProduct(k,v.id)" data-toggle="tooltip" title=""
                               data-original-title="Remove item"><i class="icon-x"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="shopping-cart-footer">

                <div class="column text-lg"><span class="text-muted">Subtotal:&nbsp; </span><span
                        class="text-gray-dark">$@{{ totalPrice }}</span></div>
            </div>
            <div class="shopping-cart-footer">
                <div class="column"><a class="btn btn-outline-secondary" href="shop-grid-ls.html"><i class="icon-arrow-left"></i>&nbsp;Back
                        to
                        Shopping</a></div>
                <div class="column"><a class="btn btn-primary" href="#" @click.prevent="toCheckout()">Checkout</a></div>
            </div>
        </div>
        <div v-if="!cart.length" class=" mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">No item yet</h3>
                    <p class="card-text">Let's go shopping ~!</p><a class="btn btn-primary" href="/">Go la~!</a>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('js')
    <script>
        new Vue({
            el: '#myCart',
            data: {
                cart: {!! $cartList !!},
            },
            computed: {
                totalPrice() {
                    var total = 0;
                    this.cart.forEach((v) => {
                        total += (v.goods.price * 1 + v.product.addPrice * 1) * v.num;
                    })
                    return total.toFixed(2);
                },
                newCart() {
                    this.cart.forEach((v) => {
                        v.unitPrice = (v.goods.price * 1 + v.product.addPrice * 1).toFixed(2);
                        v.subtotal = (v.unitPrice * v.num).toFixed(2);
                    });
                    return this.cart;
                },
            },
            mounted() {

            },
            methods: {
                delProduct(k, id) {
                    // var This =this;
                    swal({
                        title: 'Do you really want to delete？',
                        text: 'You can not recover it！',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes please！',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.value == true) {
                            axios.get('/cart/productDelete/' + id).then((res) => {
                                if (res.data.code == 1) {
                                    this.cart.splice(k, 1)
                                    toastr.success(res.data.message, "Success !", {
                                        "showMethod": "slideDown",
                                        "hideMethod": "slideUp",
                                        timeOut: 2000
                                    });
                                }
                            })
                        }
                    })
                },
                deleteAll() {
                    swal({
                        title: 'Do you really want to clear your cart',
                        text: 'You can not recover it',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes please',
                        reverseButtons: true,
                    }).then((result) => {
                        if (result.value == true) {
                            axios.get('/cart/deleteAll').then((res) => {
                                if (res.data.code == 1) {
                                    this.cart = [];
                                    toastr.success(res.data.message, "Success !", {
                                        "showMethod": "slideDown",
                                        "hideMethod": "slideUp",
                                        timeOut: 2000
                                    });
                                }
                            });
                        }
                    })
                },
                calc(v) {
                    if (!v.num || v.num < 1) {
                        v.num = 1;
                    }
                    if (v.num > 99) {
                        v.num = 99;
                    }
                    if (v.num >= 1) {
                        axios.get('/cart/calc/' + v.id + '/' + v.num)
                    }
                },
                toCheckout() {
                    ids = '';
                    totalPrice = this.totalPrice;
                    this.cart.forEach((v, k) => {
                        ids += v.id + ','
                    });
                    ids = ids.substr(0,ids.length-1);
                    location.href = "/order";
                }
            }
        })


    </script>


@endpush
