<?php

/** @var yii\web\View $this */
/** @var array $productList */
/** @var array $spending */

use \app\assets\PurchaseAsset;

PurchaseAsset::register($this);
$this->title = 'Purchase';
?>
<div class="purchase-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <input type="datetime-local" id="product-datetime" list="product-date" class="form-control" value="<?=date("d.m.Y");?>">
                            </div>
                            <div class="col-2">
                                <select id="product-user" class="form-control">
                                    <option value="1">M</option>
                                    <option value="2">K</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="product-name">Name</label>
                                <input type="text" id="product-name" list="product-list" data-id="" class="form-control">
                                <datalist id="product-list">
                                    <?foreach ($productList as $id => $product):?>
                                        <option value="<?=$product?>" data-id="<?=$id?>"></option>
                                    <?endforeach;?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="product-price">Price</label>
                                <input type="number" min="0" class="form-control" id="product-price">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="add-button">
                                <button class="btn btn-primary mb-2">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Goods purchased today
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?$newDay = '';?>
                                    <?foreach ($spending as $id => $item):?>
                                        <?
                                        $d = date('d' , strtotime($item['datetime']));
                                        if($newDay != $d):?>
                                            <tr>
                                                <td></td>
                                                <td colspan="3">
                                                    <span class="badge badge-light">
                                                        <?=$d;?>
                                                    </span>
                                                </td>
                                            </tr>
                                            <?$newDay = $d?>
                                        <?endif;?>
                                        <tr dada-id="<?=$item['id']?>">
                                            <td><?=$id+1;?></td>
                                            <td>
                                                <small>
                                                    <?=date('H:i', strtotime($item['datetime']));?>
                                                </small>
                                            </td>
                                            <td><?=$item['name']?></td>
                                            <td class="price"><?=$item['price']?></td>
                                        </tr>
                                    <?endforeach;?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td><strong class="total"></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

