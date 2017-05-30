<template>
    <div>
        <div class="col-md-8 col-md-offset-2" v-show="! error.status">
            <div class="panel panel-default">
                <div class="panel-heading">Add a new product</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" @submit.prevent="create()">
                        <div class="form-group hidden-xs">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Product name</label>

                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="name" class="form-control" name="name" autofocus="true" v-model="product_name">
                            </div>
                        </div>

                        <input type="name" class="form-control visible-xs mb12" name="name" autofocus="true" placeholder="Product name" v-model="product_name">

                        <div class="form-group hidden-xs">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Quantity in stock</label>

                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="quantity" class="form-control" name="quantity" v-model="product_quantity">
                            </div>
                        </div>

                        <input type="quantity" class="form-control visible-xs mb12" name="quantity" placeholder="Quantity in stock" v-model="product_quantity">

                        <div class="form-group hidden-xs">
                            <label class="col-md-3 col-sm-3 col-xs-3 control-label">Price per item</label>

                            <div class="col-md-8 col-sm-8 col-xs-8">
                                <input type="price" class="form-control" name="price" v-model="product_price">
                            </div>
                        </div>

                        <input type="price" class="form-control visible-xs mb12" name="price" placeholder="Price per item" v-model="product_price">

                        <div class="form-group hidden-xs">
                            <div class="col-md-4 col-sm-4 col-md-offset-7 col-sm-offset-7">
                                <button class="btn btn-primary btn-block" type="submit">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>

                    <div v-show="empty" class="alert alert-info">
                        <strong>There is no product yet. </strong> You can create one right now using the form which is right above this message.
                    </div>
                </div>

                <table class="table table-hover" v-show="! empty">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product name</th>
                            <th>Quantity in stock</th>
                            <th>Price per item</th>
                            <th>Date of creation</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="product in products">
                            <td>{{ product.id }}</td>
                            <td>{{ product.name }}</td>
                            <td>{{ product.quantity }}</td>
                            <td>${{ product.price }}</td>
                            <td>{{ product.created_at }}</td>
                            <td>${{ product.quantity * product.price }}</td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total</td>
                            <td>${{ total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div v-show="error.status" class="alert alert-warning">
            <strong>{{ error.title }}. </strong> <span v-html="error.message"></span>
        </div>
    </div>
</template>

<script>
import { api } from '../bootstrap'

export default {
    name: 'map',
    data: () => ({
        empty: false,
        error: {
            status: false,
            title: '',
            message: ''
        },
        products: [],
        product_name: '',
        product_quantity: '',
        product_price: '',
        total: 0
    }),
    mounted() {
        this.show()
    },
    methods: {
        show() {
            var that = this

            api.get('products')
                .then( function(res) {
                    if (res.data.length > 0) {
                        that.products = res.data
                        res.data.map( function(product) {
                            that.total = that.total + (product.quantity * product.price)
                        })
                        that.empty = false
                    } else {
                        that.empty = true
                    }
                })
                .catch( function(err) {
                    that.error.status = true

                    if (err.response) {
                        that.error.title = 'Error ' + err.response.status
                        that.error.message = 'Couldn\'t load the products.'
                    } else {
                        that.error.title = 'Error ' + err.response.status
                    }
                })
        },
        create() {
            api.post('products', { 'name': this.product_name, 'quantity': this.product_quantity, 'price': this.product_price })
            this.show()
            this.product_name = ''
            this.product_quantity = ''
            this.product_price = ''
        },
        total() {
            this.products.map( function(p) {
                // this.total += p.
            })
        }
    }
}
</script>
