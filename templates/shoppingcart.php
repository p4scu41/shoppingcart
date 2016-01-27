<li class="dropdown">
    <a href="" class="dropdown-toggle" data-toggle="tooltip" title="Ver carrito de compras" ng-click="shoppingcart.getDetaills($event)">
        <i class="glyphicon glyphicon-shopping-cart"></i> Carrito de compras ({{shoppingcart.count_products | number}})
    </a>
</li>

<li>
    <div class="modal fade" tabindex="-1" role="dialog" id="shoppingcartModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Productos en el carrito de compras</h4>
                </div>
                <div class="modal-body">
                    <div id="alert_shoppingcart"></div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Producto</th>
                                <th class="text-center">Cantidad</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="product in shoppingcart.products">
                                <td class="text-center">{{$index+1}}</td>
                                <td>{{product.detaills.name}}</td>
                                <td class="text-center col-md-2">
                                    <input type="number" ng-model="product.quantity" min="1" class="form-control" size="3" ng-change="$parent.shoppingcart.calSubtotal()" />
                                </td>
                                <td class="text-right">{{product.detaills.price}}</td>
                                <td class="text-right">{{product.quantity * product.detaills.price | currency}}</td>
                                <td class="text-center"><a class="btn btn-danger" href="" ng-click="shoppingcart.removeProduct(product.detaills.id, $event)"><i class="fa fa-trash-o"></i> </a></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><strong>{{shoppingcart.subtotal | currency}}</strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-danger" ng-click="shoppingcart.clean($event)">
                        <i class="fa fa-trash-o"></i> Eliminar carrito
                    </button>
                    <button type="button" class="btn btn-success" ng-click="purchase()">
                        <i class="fa fa-check-circle-o"></i> Finalizar la compra
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</li>