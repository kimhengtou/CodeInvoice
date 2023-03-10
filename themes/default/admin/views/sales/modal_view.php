<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="modal-dialog modal-lg no-modal-header">
    <div class="modal-content">
       
        <div class="modal-body" style="margin: 5px;">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                <i class="fa fa-2x">&times;</i>
            </button>
            <button type="button" class="btn btn-xs btn-default no-print pull-right" style="margin-right:15px;" onclick="window.print();">
                <i class="fa fa-print"></i> <?= lang('print'); ?>
            </button>
            <?php if ($logo) {
                ?>
                <div class="text-right" style="margin: bottom 20px">
            <div>
            <img src="css/pic.png" width="250" height="80" /> 
     <div>
        <div class='text-center mb-2'> <h1>Invoice<h1></div> 
            </div>      
            <?php
            } ?>
           
            <!-- <div class="well well-sm">
                <div class="row bold">
                    <div class="col-xs-5 text-center">
                    <p class="bold">
                        <?= lang('date'); ?>: <?= $this->sma->hrld($inv->date); ?><br>
                        <?= lang('ref'); ?>: <?= $inv->reference_no; ?><br>
                        <?php if (!empty($inv->return_sale_ref)) {
                            echo lang('return_ref') . ': ' . $inv->return_sale_ref;
                            if ($inv->return_id) {
                                echo ' <a data-target="#myModal2" data-toggle="modal" href="' . admin_url('sales/modal_view/' . $inv->return_id) . '"><i class="fa fa-external-link no-print"></i></a><br>';
                            } else {
                                echo '<br>';
                            }
                        } ?>
                        
                        <?= lang('sale_status'); ?>: <?= lang($inv->sale_status); ?><br>
                        <?= lang('payment_status'); ?>: <?= lang($inv->payment_status); ?><br>
                        <?= $inv->payment_method ? lang('payment_method') . ': ' . lang($inv->payment_method) : ''; ?>
                        <?php
                        if ($inv->payment_status != 'paid' && $inv->due_date) {
                            echo '<br>' . lang('due_date') . ': ' . $this->sma->hrsd($inv->due_date);
                        } ?>
                    </p>
                    </div>
                    <div class="col-xs-7 text-right order_barcodes">
                        <img src="<?= admin_url('misc/barcode/' . $this->sma->base64url_encode($inv->reference_no) . '/code128/74/0/1'); ?>" alt="<?= $inv->reference_no; ?>" class="bcimg" />
                        <?php
                        if ($Settings->ksa_qrcode) {
                            $qrtext = $this->inv_qrcode->base64([
                                'seller'           => $biller->company && $biller->company != '-' ? $biller->company : $biller->name,
                                'vat_no'           => $biller->vat_no ?: $biller->get_no,
                                'date'             => $inv->date,
                                'grand_total'      => $return_sale ? ($inv->grand_total + $return_sale->grand_total) : $inv->grand_total,
                                'total_KH'      => $return_sale ? ($inv->total_KH + $return_sale->total_KH) : $inv->total_KH,
                                'total_tax_amount' => $return_sale ? ($inv->total_tax + $return_sale->total_tax) : $inv->total_tax,
                            ]);
                            echo $this->sma->qrcode('text', $qrtext, 2);
                        } else {
                            echo $this->sma->qrcode('link', urlencode(site_url('view/sale/' . $inv->hash)), 2);
                        }
                        ?>
                    </div> -->
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="row" style="margin-bottom:15px;">

                <?php if ($Settings->invoice_view == 1) {
                    ?>
                    <div class="col-xs-12 text-center">
                        <h1><?= lang('tax_invoice'); ?></h1>
                    </div>
                    <?php
                } ?>

                <div class="col-xs-6 text-align: right;">
                    <!-- <?php echo $this->lang->line('to'); ?>:<br/> -->
                    <!-- <h2 style="margin-top:10px;"><?= $customer->company && $customer->company != '-' ? $customer->company : $customer->name; ?></h2> -->
                    <!-- <h2 style="margin-top:10px;"><?=  $customer->name; ?></h2> -->
                    <h2 style="margin-top:10px;"><?=  $customer->company; ?></h2>
                    <!-- <?= $customer->company                              && $customer->company != '-' ? '' : 'Attn: ' . $customer->name ?> -->
                    <!-- <?= $customer->company                              && $customer->company != '-' ? '' : 'Attn: ' . $customer->name ?> -->

                    <?php
                     echo lang('tel') . ': ' . $customer->phone . '';
                     echo '<p>';
                    // echo $customer->address . '<br>' . $customer->city . ' ' . $customer->postal_code . ' ' . $customer->state . '<br>' . $customer->country;
                    // echo  $customer->city . ' ' . $customer->postal_code . ' ' . $customer->state . ' ' . $customer->country;
                    echo $customer->address . '<br>' . $customer->city . ' ' . $customer->postal_code . ' ' . $customer->state ;

                    echo '<p>';

                    if ($customer->vat_no != '-' && $customer->vat_no != '') {
                        echo '<br>' . lang('vat_no') . ': ' . $customer->vat_no;
                    }
                    if ($customer->gst_no != '-' && $customer->gst_no != '') {
                        echo '<br>' . lang('gst_no') . ': ' . $customer->gst_no;
                    }
                    if ($customer->cf1 != '-' && $customer->cf1 != '') {
                        echo '<br>' . lang('ccf1') . ': ' . $customer->cf1;
                    }
                    if ($customer->cf2 != '-' && $customer->cf2 != '') {
                        echo '<br>' . lang('ccf2') . ': ' . $customer->cf2;
                    }
                    if ($customer->cf3 != '-' && $customer->cf3 != '') {
                        echo '<br>' . lang('ccf3') . ': ' . $customer->cf3;
                    }
                    if ($customer->cf4 != '-' && $customer->cf4 != '') {
                        echo '<br>' . lang('ccf4') . ': ' . $customer->cf4;
                    }
                    if ($customer->cf5 != '-' && $customer->cf5 != '') {
                        echo '<br>' . lang('ccf5') . ': ' . $customer->cf5;
                    }
                    if ($customer->cf6 != '-' && $customer->cf6 != '') {
                        echo '<br>' . lang('ccf6') . ': ' . $customer->cf6;
                    }

                    // echo '</p>';
                    // echo lang('tel') . ': ' . $customer->phone . '<br>' . lang('email') . ': ' . $customer->email;
                    // echo lang('tel') . ': ' . $customer->phone . '';
                    ?>
                </div>


                <div class="row bold">
                    <div class="col-xs-6 text-right">
                    <p class="bold">
                    <?= lang('Invoice N???'); ?>: <?= $inv->reference_no; ?><br>
                        <?= lang('Invoice date'); ?>: <?= $this->sma->hrsd($inv->date); ?><br>
                        <!-- <?= lang('Invoice N???'); ?>: <?= $inv->reference_no; ?><br> -->
                        <?php if (!empty($inv->return_sale_ref)) {
                            echo lang('return_Invoice N???') . ': ' . $inv->return_sale_ref;
                            if ($inv->return_id) {
                                
                                echo ' <a data-target="#myModal2" data-toggle="modal" href="' . admin_url('sales/modal_view/' . $inv->return_id) . '"><i class="fa fa-external-link no-print"></i></a><br>';
                            } else {
                                echo '<br>';
                            }
                        } ?>
                        <!-- <?= lang('sale_status'); ?>: <?= lang($inv->sale_status); ?><br>
                        <?= lang('payment_status'); ?>: <?= lang($inv->payment_status); ?><br> -->
                        <!-- <?= $inv->payment_method ? lang('payment_method') . ': ' . lang($inv->payment_method) : ''; ?>
                        <?php
                        if ($inv->payment_status != 'paid' && $inv->due_date) {
                            echo '<br>' . lang('due_date') . ': ' . $this->sma->hrsd($inv->due_date);
                        } ?> -->
                        <?=lang('Due_ddate');?>: <?=$this->sma->hrsd($inv->due_date);?><br>
<!-- create in quotes username  -->
                      
                            <!-- <?= lang('PO_By'); ?>: <?= $created_by->first_name . ' ' . $created_by->last_name;  ?> <br> -->
                           <?= lang('PO_BY'); ?>:  <br>
                           
                           
                           
                    </p>
                    </div>
                <div class="text-align:center">
                    <!-- <?php echo $this->lang->line('from'); ?>:
                    <h2 style="margin-top:10px;"><?= $biller->company && $biller->company != '-' ? $biller->company : $biller->name; ?></h2>
                    <?= $biller->company ? '' : 'Attn: ' . $biller->name ?>

                    <?php
                    echo $biller->address . '<br>' . $biller->city . ' ' . $biller->postal_code . ' ' . $biller->state . '<br>' . $biller->country;

                    echo '<p>';

                    if ($biller->vat_no != '-' && $biller->vat_no != '') {
                        echo '<br>' . lang('vat_no') . ': ' . $biller->vat_no;
                    }
                    if ($biller->gst_no != '-' && $biller->gst_no != '') {
                        echo '<br>' . lang('gst_no') . ': ' . $biller->gst_no;
                    }
                    if ($biller->cf1 != '-' && $biller->cf1 != '') {
                        echo '<br>' . lang('bcf1') . ': ' . $biller->cf1;
                    }
                    if ($biller->cf2 != '-' && $biller->cf2 != '') {
                        echo '<br>' . lang('bcf2') . ': ' . $biller->cf2;
                    }
                    if ($biller->cf3 != '-' && $biller->cf3 != '') {
                        echo '<br>' . lang('bcf3') . ': ' . $biller->cf3;
                    }
                    if ($biller->cf4 != '-' && $biller->cf4 != '') {
                        echo '<br>' . lang('bcf4') . ': ' . $biller->cf4;
                    }
                    if ($biller->cf5 != '-' && $biller->cf5 != '') {
                        echo '<br>' . lang('bcf5') . ': ' . $biller->cf5;
                    }
                    if ($biller->cf6 != '-' && $biller->cf6 != '') {
                        echo '<br>' . lang('bcf6') . ': ' . $biller->cf6;
                    }

                    echo '</p>';
                    echo lang('tel') . ': ' . $biller->phone . '<br>' . lang('email') . ': ' . $biller->email;
                    ?> -->
                </div>

            </div>
            <?php
                    $col = $Settings->indian_gst ? 5 : 4;
            if ($Settings->product_discount && $inv->product_discount != 0) {
                $col++;
            }
            if ($Settings->tax1 && $inv->product_tax > 0) {
                $col++;
            }
            if ($Settings->product_discount && $inv->product_discount != 0 && $Settings->tax1 && $inv->product_tax > 0) {
                $tcol = $col - 2;
            } elseif ($Settings->product_discount && $inv->product_discount != 0) {
                $tcol = $col - 1;
            } elseif ($Settings->tax1 && $inv->product_tax > 0) {
                $tcol = $col - 1;
            } else {
                $tcol = $col;
            }
            ?>
<!-- order_exchange -->
<?php
                    $col = $Settings->indian_gst ? 5 : 4;
            // if ($Settings->order_exchange && $inv->order_exchange != 0) {
            //     $col++;
            // }
            if ($Settings->tax1 && $inv->product_tax > 0) {
                $col++;
            // }
            // if ($Settings->order_exchange && $inv->order_exchange != 0 && $Settings->tax1 && $inv->product_tax > 0) {
            //     $tcol = $col - 2;
            // } elseif ($Settings->order_exchange && $inv->order_exchange != 0) {
            //     $tcol = $col - 1;
            } elseif ($Settings->tax1 && $inv->product_tax > 0) {
                $tcol = $col - 1;
            } else {
                $tcol = $col;
            }
            ?>

            <div >
<!-- <table class="table" style="width=100% ; margin-bottom: 10px; "> -->
                <table class="table table-bordered table-hover">
<!-- table header  -->
                    <thead>
                    <tr style="border-top: 0px solid black;font-size: 10px;">
                   
                        <th><?= lang('no.'); ?></th>
                         <th><?= lang('Barcode'); ?></th>
                        <th><?= lang('Product Name'); ?></th>
                        <?php if ($Settings->indian_gst) {
                            ?>
                            <th><?= lang('hsn_sac_code'); ?></th>
                            <?php
                        } ?>
                        <th><?= lang('quantity'); ?></th>
                        <th><?= lang('unit_price'); ?></th>
                        <?php
                        if ($Settings->tax1 && $inv->product_tax > 0) {
                            echo '<th>' . lang('tax') . '</th>';
                        }
                        // if ($Settings->product_discount && $inv->product_discount != 0) {
                           
                        //     echo '<th>' . lang('discount') . '</th>';
                            
                            
                        // }

// exchange
                        // if ($Settings->tax1 && $inv->order_exchange > 0){
                        //     echo '<th>' . lang('exchange') . '</th>';
                        //     // round_of_exchange_rate
                        //     // echo(round($inv->order_exchange>0,0,PHP_ROUND_HALF_UP) . "<br>");
                           
                        // }
                        
                        ?>
                        <th><?= lang('Amount'); ?></th>

                       
                    </tr>
                    
                    </thead>
<!-- end table header -->
                    <tbody>
                    <?php $r =1;
                    
                    foreach ($rows as $row) :
                       ?>    
                        <td style="text-align:center; width:30px; vertical-align:middle;"><?= $r ?></td>
                            
                            <td class="text-center" style="vertical-align:middle;">
                               <?= $row->product_code ? '' . $row->product_code : ''; ?>
                                <!-- <?= $row->product_code . ' - ' . $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : ''); ?> -->
                                <?= $row->second_name ? '<br>' . $row->second_name : ''; ?>
                                <?= $row->details ? '<br>' . $row->details : ''; ?>
                                <?= $row->serial_no ? '<br>' . $row->serial_no : ''; ?>
                            </td>

                            <td>
                                <?= $row->product_name ? '' . $row->product_name : ''; ?>
                            </td>
                            <?php if ($Settings->indian_gst) {
                                ?>
                            <td style="width: 80px; text-align:center; vertical-align:middle;"><?= $row->hsn_code ?: ''; ?></td>
                                <?php
                            } ?>
                            <!-- <td style="width: 80px; text-align:center; vertical-align:middle;"><?= $this->sma->formatQuantity($row->unit_quantity) . ' ' . ($inv->sale_status == 'returned' ? $row->base_unit_code : $row->product_unit_code); ?></td> -->
                            <td style="width: 80px; text-align:center; vertical-align:middle;"><?= $this->sma->formatQuantity($row->unit_quantity) .'' ?></td>
                            <td style="text-align:right; width:100px;">
                                <?= $row->unit_price != $row->real_unit_price && $row->item_discount > 0 ? '<del>' . $this->sma->formatMoney($row->real_unit_price) . '</del>' : ''; ?>
                                <?= $this->sma->formatMoney($row->unit_price); ?>
                            </td>
                            <?php
                            if ($Settings->tax1 && $inv->product_tax > 0) {
                                echo '<td style="width: 100px; text-align:right; vertical-align:middle;">' . ($row->item_tax != 0 ? '<small>(' . ($Settings->indian_gst ? $row->tax : $row->tax_code) . ')</small>' : '') . ' ' . $this->sma->formatMoney($row->item_tax) . '</td>';
                            }
//product_discount_price show in table 
                            // if ($Settings->product_discount && $inv->product_discount != 0) {
                            //     echo '<td style="width: 100px; text-align:right; vertical-align:middle;">' . ($row->discount != 0 ? '<small>(' . $row->discount . ')</small> ' : '') . $this->sma->formatMoney($row->item_discount) . '</td>';
                            // }
 // Setting order_exchange
                            // if ($Settings->order_exchange && $inv->order_exchange != 0) {
                            //     echo '<td style="width: 100px; text-align:right; vertical-align:middle;">' . ($row->exchange != 0 ? '<small>(' . $row->exchange . ')</small> ' : '') . $this->sma->formatMoney($row->item_exchange) . '</td>';
                            // }
                            ?>
                            <td style="text-align:right; width:120px;"><?= $this->sma->formatMoney($row->subtotal); ?></td>
                        </tr>
                        <?php
                       $r++;
                       endforeach;           
// example  you can play around it.
                  $item_count =count($rows);
                  $n = $r ;
                  for ($i=0; $i < (10 - $item_count); $i++){
                    ?> 
                    <tr style="border-top: 1px solid black;">
                        <td style="text-align:center; width:3px;font-size: 10px; vertical-align:middle;"><?= $n ?></td>
                        <td style="padding: 6px;border: 1px solid black;font-size: 10px; text-align:right; width: 4%;"></td>
                        <td style="padding: 6px;border: 1px solid black;font-size: 10px; text-align:right; width: 63%;"></td>
                        <td style="padding: 6px;border: 1px solid black;font-size: 10px; text-align:right; width: 3%;"></td>
                        <td style="padding: 6px;border: 1px solid black;font-size: 10px; text-align:right; width: 11%;"></td>
                        <td style="padding: 6px;border: 1px solid black;font-size: 10px; text-align:right; width: 12%;"></td>
                    </tr>
                    <?php 
                    $n++;
                  }
                    if ($return_rows) {
                        echo '<tr class="warning"><td colspan="100%" class="no-border"><strong>' . lang('returned_items') . '</strong></td></tr>';
                        foreach ($return_rows as $row) :
                            ?>
                            <tr class="warning">
                                <td style="text-align:center; width:40px; vertical-align:middle;"><?= $r; ?></td>
                                
                                <td style="vertical-align:middle;">
                                    <?= $row->product_code . ' - ' . $row->product_name . ($row->variant ? ' (' . $row->variant . ')' : ''); ?>
                                    <?= $row->second_name ? '<br>' . $row->second_name : ''; ?>
                                    <?= $row->details ? '<br>' . $row->details : ''; ?>
                                    <?= $row->serial_no ? '<br>' . $row->serial_no : ''; ?>
                                </td>
                                <?php if ($Settings->indian_gst) {
                                    ?>
                                <td style="width: 80px; text-align:center; vertical-align:middle;"><?= $row->hsn_code ?: ''; ?></td>
                                    <?php
                                } ?>
                                <!-- <td style="width: 80px; text-align:center; vertical-align:middle;"><?= $this->sma->formatQuantity($row->quantity) . ' ' . $row->base_unit_code; ?></td> -->
                                <td style="width: 80px; text-align:center; vertical-align:middle;"><?= $this->sma->formatQuantity($row->quantity) . ' ' . $row->base_unit_code; ?></td>
                                <td style="text-align:right; width:100px;"><?= $this->sma->formatMoney($row->unit_price); ?></td>
                                <?php
                                if ($Settings->tax1 && $inv->product_tax > 0) {
                                    echo '<td style="width: 100px; text-align:right; vertical-align:middle;">' . ($row->item_tax != 0 ? '<small>(' . ($Settings->indian_gst ? $row->tax : $row->tax_code) . ')</small>' : '') . ' ' . $this->sma->formatMoney($row->item_tax) . '</td>';
                                }
                                if ($Settings->product_discount && $inv->product_discount != 0) {
                                    echo '<td style="width: 100px; text-align:right; vertical-align:middle;">' . ($row->discount != 0 ? '<small>(' . $row->discount . ')</small> ' : '') . $this->sma->formatMoney($row->item_discount) . '</td>';
                                } 
 // Setting order_exchange 
                                if ($Settings->order_exchange && $inv->order_exchange != 0) {
                                    echo '<td style="width: 100px; text-align:right; vertical-align:middle;">' . ($row->exchange != 0 ? '<small>(' . $row->exchange . ')</small> ' : '') . $this->sma->formatMoney($row->item_exchange) . '</td>';
                                } 
                                
                                ?>
                                <td style="text-align:right; width:120px;"><?= $this->sma->formatMoney($row->subtotal); ?></td>
                            </tr>
                            <?php
                            $r++;
                        endforeach;
                    }
                    ?>
 <!-- </table> -->
                    </tbody>
<!-- footer section  -->
                    <tfoot>
       
 <!-- <table class=" table-bordered table-hover??????", style="width:110%"> -->
    
                    <?php if ($inv->grand_total ) {
                        ?>
                        
                        <?php 
                        $total = $return_sale ? ($inv->grand_total + $return_sale->grand_total) : $inv->grand_total;
                        ?>
                       
                        <!-- <tr>
                            <td></td>
                            <td colspan="<?= $tcol; ?>"
                                style="text-align:right; padding-right:10px;"><?= lang('total'); ?>
                                (<?= $default_currency->code; ?>)
                            </td>
                            
                            <?php
                            if ($Settings->tax1 && $inv->product_tax > 0) {
                                echo '<td style="text-align:right;">' . $this->sma->formatMoney($return_sale ? ($inv->product_tax + $return_sale->product_tax) : $inv->product_tax) . '</td>';
                            }
                            if ($Settings->product_discount && $inv->product_discount != 0) {
                                echo '<td style="text-align:right;">' . $this->sma->formatMoney($return_sale ? ($inv->product_discount + $return_sale->product_discount) : $inv->product_discount) . '</td>';
                            } 
// Setting order_exchange
                            if ($Settings->order_exchange && $inv->order_exchange != 0) {
                                echo '<td style="text-align:right;">' . $this->sma->formatMoney($return_sale ? ($inv->order_exchange + $return_sale->order_exchange) : $inv->order_exchange) . '</td>';
                            } 
                            ?>
                            
                            <td style="text-align:right; padding-right:10px;"><?= $this->sma->formatMoney($return_sale ? (($inv->total + $inv->product_tax) + ($return_sale->total + $return_sale->product_tax)) : ($inv->total + $inv->product_tax)); ?></td>
                        </tr> -->
                        <?php
                        // }
                        
                    } ?>
                    <?php
                    if ($return_sale) {
                        echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('return_total') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($return_sale->grand_total) . '</td></tr>';
                    }
                    if ($inv->surcharge != 0) {
                        echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('return_surcharge') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($inv->surcharge) . '</td></tr>';
                    }
                    ?>

                    <?php if ($Settings->indian_gst) {
                        if ($inv->cgst > 0) {
                            $cgst = $return_sale ? $inv->cgst + $return_sale->cgst : $inv->cgst;
                            echo '<tr><td colspan="' . $col . '" class="text-right">' . lang('cgst') . ' (' . $default_currency->code . ')</td><td class="text-right">' . ($Settings->format_gst ? $this->sma->formatMoney($cgst) : $cgst) . '</td></tr>';
                        }
                        if ($inv->sgst > 0) {
                            $sgst = $return_sale ? $inv->sgst + $return_sale->sgst : $inv->sgst;
                            echo '<tr><td colspan="' . $col . '" class="text-right">' . lang('sgst') . ' (' . $default_currency->code . ')</td><td class="text-right">' . ($Settings->format_gst ? $this->sma->formatMoney($sgst) : $sgst) . '</td></tr>';
                        }
                        if ($inv->igst > 0) {
                            $igst = $return_sale ? $inv->igst + $return_sale->igst : $inv->igst;
                            echo '<tr><td colspan="' . $col . '" class="text-right">' . lang('igst') . ' (' . $default_currency->code . ')</td><td class="text-right">' . ($Settings->format_gst ? $this->sma->formatMoney($igst) : $igst) . '</td></tr>';
                        }
                    } ?>
                   

                    <!-- <?php if ($inv->order_discount) {
                        // echo '<tr><td></td><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('discount') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . ($inv->order_discount_id ? '<small>(' . $inv->order_discount_id . ')</small> ' : '') . $this->sma->formatMoney($return_sale ? ($inv->order_discount + $return_sale->order_discount) : $inv->order_discount) . '</td></tr>';
                        echo '<tr><td></td><td colspan="' . $col . '" style="text-align:right; padding-right:10px;">' . lang('discount11') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . ($inv->order_discount_id ? '<small>(' . $inv->order_discount_id . ')</small> ' : '') . $this->sma->formatMoney($return_sale ? ($inv->order_discount + $return_sale->order_discount) : $inv->order_discount) . '</td></tr>';
                    }
                    ?> -->
                    <?php if ($Settings->tax2 && $inv->order_tax != 0) {
                        echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;">' . lang('order_tax') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($return_sale ? ($inv->order_tax + $return_sale->order_tax) : $inv->order_tax) . '</td></tr>';
                        
                    }
                    ?>
                    <?php if ($inv->shipping != 0) {
                        echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('shipping') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($inv->shipping - ($return_sale && $return_sale->shipping ? $return_sale->shipping : 0)) . '</td></tr>';
                    }
                    ?>
                    <!-- <tr>
                        <td></td> -->
                        <!-- <td colspan="<?= $col; ?>"
                            style="text-align:right; font-weight:bold;"><?= lang('Total'); ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                       
                        <td style="text-align:right; padding-right:10px; font-weight:bold;"><?= $this->sma->formatMoney($return_sale ? ($inv->grand_total + $return_sale->grand_total) : $inv->grand_total); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="<?= $col; ?>"
                            style="text-align:right; font-weight:bold;"><?= lang('paid'); ?>
                            (<?= $default_currency->code; ?>)
                        </td> -->
                        <!-- <td style="text-align:right; font-weight:bold;"><?= $this->sma->formatMoney($return_sale ? ($inv->paid + $return_sale->paid) : $inv->paid); ?></td>
                    </tr> -->
                    <!-- <tr>
                        <td></td>
                        <td colspan="<?= $col; ?>"
                            style="text-align:right; font-weight:bold;"><?= lang('Total Amount'); ?>
                            (<?= $default_currency->code; ?>)
                        </td>
                        <td style="text-align:right; font-weight:bold;"><?= $this->sma->formatMoney(($return_sale ? ($inv->grand_total + $return_sale->grand_total) : $inv->grand_total) - ($return_sale ? ($inv->paid + $return_sale->paid) : $inv->paid)); ?></td>
                    </tr> -->


                   
                   
                   <!-- <tr>
                    <td></td>
                    <td colspan="<?= $col; ?>"
                    style="text-align:right; font-weight:bold;"> Total KHR 
                </td>
                <td style="text-align:right; padding-right:10px; font-weight:bold;"><?= $this->sma->formatMoney($total * $_COOKIE["exchange"]); ?></td>
                
                </tr> -->

                <!-- </div> -->
        
                    </tfoot>
                </table>
            <?= $Settings->invoice_view > 0 ? $this->gst->summary($rows, $return_rows, ($return_sale ? $inv->product_tax + $return_sale->product_tax : $inv->product_tax)) : ''; ?>

                    <div class="row">
                    <!-- <div class="well well-sm"> -->
                    <div class="col-xs-12" style="display:none;"> </div>
                    <div class="col-xs-12" style="margin-top:0px;">
                 
                    <div class="col-xs-4" style="text-align:left;">
                    <!-- <span>QRcode ABA</span> -->
                    <img src="css/ABA.png" width="300" height="100" />  
                 </div>
                  <!-- <div class="col-xs-2" style="text-align:center;">
                <span>Tou kimheng</span>
                  <h4>712813656 </h4>
                </div> -->
                    <div class="col-xs-6" style="text-align:right;">
                   
                    <tfoot>   
<!-- price_of_total_after_product_discount -->   
<table class="table-bordered table-hover" style="width:146%">

<?php if ($inv->grand_total ) {
    ?>
    
    <?php 
    $total = $return_sale ? ($inv->grand_total + $return_sale->grand_total) : $inv->grand_total;
    ?>
   
    <tr>

        <td></td>
        <td colspan="<?= $tcol; ?>"
            style="text-align:right; padding-right:10px;width: 65%;"><?= lang('totalss'); ?>
            (<?= $default_currency->code; ?>)
        </td>
        
        <?php
        if ($Settings->tax1 && $inv->product_tax > 0) {
            echo '<td style="text-align:right;">' . $this->sma->formatMoney($return_sale ? ($inv->product_tax + $return_sale->product_tax) : $inv->product_tax) . '</td>';
        }
        // if ($Settings->product_discount && $inv->product_discount != 0) {
        //     echo '<td style="text-align:right;">' . $this->sma->formatMoney($return_sale ? ($inv->product_discount + $return_sale->product_discount) : $inv->product_discount) . '</td>';
        // } 
// Setting order_exchange
        // if ($Settings->order_exchange && $inv->order_exchange != 0) {
        //     echo '<td style="text-align:right;">' . $this->sma->formatMoney($return_sale ? ($inv->order_exchange + $return_sale->order_exchange) : $inv->order_exchange) . '</td>';
        // } 
        ?>
        
        <td style="text-align:right; padding-right:10px;"><?= $this->sma->formatMoney($return_sale ? (($inv->total + $inv->product_tax) + ($return_sale->total + $return_sale->product_tax)) : ($inv->total + $inv->product_tax)); ?></td>
    </tr>
    <?php
    // }
    
} ?>

<?php
if ($return_sale) {
    echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('return_total') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($return_sale->grand_total) . '</td></tr>';
}
if ($inv->surcharge != 0) {
    echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('return_surcharge') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($inv->surcharge) . '</td></tr>';
}
?>

<?php if ($Settings->indian_gst) {
    if ($inv->cgst > 0) {
        $cgst = $return_sale ? $inv->cgst + $return_sale->cgst : $inv->cgst;
        echo '<tr><td colspan="' . $col . '" class="text-right">' . lang('cgst') . ' (' . $default_currency->code . ')</td><td class="text-right">' . ($Settings->format_gst ? $this->sma->formatMoney($cgst) : $cgst) . '</td></tr>';
    }
    if ($inv->sgst > 0) {
        $sgst = $return_sale ? $inv->sgst + $return_sale->sgst : $inv->sgst;
        echo '<tr><td colspan="' . $col . '" class="text-right">' . lang('sgst') . ' (' . $default_currency->code . ')</td><td class="text-right">' . ($Settings->format_gst ? $this->sma->formatMoney($sgst) : $sgst) . '</td></tr>';
    }
    if ($inv->igst > 0) {
        $igst = $return_sale ? $inv->igst + $return_sale->igst : $inv->igst;
        echo '<tr><td colspan="' . $col . '" class="text-right">' . lang('igst') . ' (' . $default_currency->code . ')</td><td class="text-right">' . ($Settings->format_gst ? $this->sma->formatMoney($igst) : $igst) . '</td></tr>';
    }
} ?>
<?php if ($inv->order_discount) {
    
    echo '<tr><td></td><td colspan="' . $col . '" style="text-align:right; padding-right:10px;">' . lang('COD_discount') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . ($inv->order_discount_id ? '<small>(' . $inv->order_discount_id . ')</small> ' : '') . $this->sma->formatMoney($return_sale ? ($inv->order_discount + $return_sale->order_discount) : $inv->order_discount) . '</td></tr>';
}
?>
<?php if ($Settings->tax2 && $inv->order_tax != 0) {
    echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;">' . lang('order_tax') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($return_sale ? ($inv->order_tax + $return_sale->order_tax) : $inv->order_tax) . '</td></tr>';
    
}
?>
<?php if ($inv->shipping != 0) {
    echo '<tr><td colspan="' . $col . '" style="text-align:right; padding-right:10px;;">' . lang('shipping') . ' (' . $default_currency->code . ')</td><td style="text-align:right; padding-right:10px;">' . $this->sma->formatMoney($inv->shipping - ($return_sale && $return_sale->shipping ? $return_sale->shipping : 0)) . '</td></tr>';
}
?>

<tr>
    <td></td>
    <td colspan="<?= $col; ?>"
        style="text-align:right; padding-right:10px; font-weight:bold;"><?= lang('Total Amount'); ?>
        (<?= $default_currency->code; ?>)
    </td>
    <td style="text-align:right; padding-right:10px; font-weight:bold;"><?= $this->sma->formatMoney(($return_sale ? ($inv->grand_total + $return_sale->grand_total) : $inv->grand_total) - ($return_sale ? ($inv->paid + $return_sale->paid) : $inv->paid)); ?></td>
</tr>

<tr>
<td></td>
<td colspan="<?= $col; ?>"
style="text-align:right; padding-right:10px; font-weight:bold;"> Total KHR 
</td>
<!-- <td style="text-align:right; padding-right:8px; font-weight:bold;"><?= $this->sma->formatMoney($total * $_COOKIE["exchange"]); ?></td> -->
<td style="text-align:right; padding-right:8px; font-weight:bold;"><?= $this->sma->formatMoney($total * $_COOKIE["exchange"]); ?></td>
</tr>
</table>
</tfoot>
     </div>
                <div class="row">
                <div class="col-xs-12">
                    
                    <?php
                    if ($inv->note || $inv->note != '') {
                        ?>
                            <div class="well well-sm">
                            <div class="col-xs-12" style="display:none;"> </div>
                            <div class="col-xs-12" style="margin-top:0px;">
                            <div class="col-xs-4" style="text-align:left;">
                      
                                <p class="bold"><?= lang('note'); ?>:</p>
                                
                                <div><?= $this->sma->decode_html($inv->note); ?></div> 
                            </div>
                    
                        <?php
                    }
                    if ($inv->staff_note || $inv->staff_note != '') {
                        ?>
                            <div class="well well-sm staff_note">
                                <p class="bold"><?= lang('staff_note'); ?>:</p>
                                <div><?= $this->sma->decode_html($inv->staff_note); ?></div>
                            </div>
                        <?php
                    } ?>
                </div>
                <div class="row">
                    
                   <div class="col-xs-12" style="display:none;"> </div>
                   <div class="col-xs-12" style="margin-top:0px;">
                   <div class="col-xs-4" style="text-align:left;">
                   <span>Authorise</span>  
                </div>
                <div class="col-xs-4" style="text-align:center;">
                <span>Delivery By</span>
                </div>
                <div class="col-xs-4" style="text-align:right;">
                <span>Received By</span>
                </div>
            </div>

                <?php if ($customer->award_points != 0 && $Settings->each_spent > 0) {
                    ?>
                <div class="col-xs-5 pull-right">
                    <div class="well well-sm">
                        <?=
                        '<p>' . lang('this_sale') . ': ' . floor(($inv->grand_total / $Settings->each_spent) * $Settings->ca_point)
                        . '<br>' .
                        // '<p>' . lang('this_sale') . ': ' . floor(($inv->total_KH / $Settings->each_spent) * $Settings->ca_point)
                        '<p>' . lang('this_sale') . ': ' . floor(($inv->total_KH / $Settings->each_spent) * $Settings->ca_point)
                        . '<br>' .
                        lang('total') . ' ' . lang('award_points') . ': ' . $customer->award_points . '</p>'; ?>
                    </div>
                </div>
                    <?php
                } ?>
                        <!-- pull-right -->
                    <div class="col-xs-12" style="margin-top:100px;">   
                <div class="col-xs-4" style="text-align:left">
                    <div class="well well-sm">
                        <p>
                            <!-- <?= lang('created_by'); ?>: <?= $inv->created_by ? $created_by->first_name . ' ' . $created_by->last_name : $customer->name; ?> <br> -->
                             <?= $inv->created_by ? $created_by->first_name . ' ' . $created_by->last_name : $customer->name; ?> <br>
                             
                            <h4> Accountant <h4> 
                            <!-- <?= lang('date'); ?>: <?= $this->sma->hrld($inv->date); ?> -->
                        </p>
                        <!-- <?php if ($inv->updated_by) {
                            ?>
                        <p>
                            <?= lang('updated_by'); ?>: <?= $updated_by->first_name . ' ' . $updated_by->last_name; ?><br>
                            <?= lang('update_at'); ?>: <?= $this->sma->hrld($inv->updated_at); ?>
                        </p>
                            <?php
                        } ?> -->
                    </div>
                </div>
            </div>
            <?php include(dirname(__FILE__) . '/../partials/attachments.php'); ?>
            <!-- <?php include FCPATH . 'themes' . DIRECTORY_SEPARATOR . $Settings->theme . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR . 'attachments.php'; ?> -->
            <?php if (!$Supplier || !$Customer) {
                ?>
                <div class="buttons">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <a href="<?= admin_url('sales/add_payment/' . $inv->id) ?>" class="tip btn btn-primary" title="<?= lang('add_payment') ?>" data-toggle="modal" data-target="#myModal2">
                                <i class="fa fa-dollar"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('payment') ?></span>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= admin_url('sales/add_delivery/' . $inv->id) ?>" class="tip btn btn-primary" title="<?= lang('add_delivery') ?>" data-toggle="modal" data-target="#myModal2">
                                <i class="fa fa-truck"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('delivery') ?></span>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= admin_url('sales/email/' . $inv->id) ?>" data-toggle="modal" data-target="#myModal2" class="tip btn btn-primary" title="<?= lang('email') ?>">
                                <i class="fa fa-envelope-o"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('email') ?></span>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="<?= admin_url('sales/pdf/' . $inv->id) ?>" class="tip btn btn-primary" title="<?= lang('download_pdf') ?>">
                                <i class="fa fa-download"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('pdf') ?></span>
                            </a>
                        </div>
                        <?php if (!$inv->sale_id) {
                            ?>
                        <div class="btn-group">
                            <a href="<?= admin_url('sales/edit/' . $inv->id) ?>" class="tip btn btn-warning sledit" title="<?= lang('edit') ?>">
                                <i class="fa fa-edit"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('edit') ?></span>
                            </a>
                        </div>
                        <div class="btn-group">
                            <a href="#" class="tip btn btn-danger bpo" title="<b><?= $this->lang->line('delete_sale') ?></b>"
                                data-content="<div style='width:150px;'><p><?= lang('r_u_sure') ?></p><a class='btn btn-danger' href='<?= admin_url('sales/delete/' . $inv->id) ?>'><?= lang('i_m_sure') ?></a> <button class='btn bpo-close'><?= lang('no') ?></button></div>"
                                data-html="true" data-placement="top">
                                <i class="fa fa-trash-o"></i>
                                <span class="hidden-sm hidden-xs"><?= lang('delete') ?></span>
                            </a>
                        </div>
                            <?php
                        } ?>
                    </div>
                </div>
                <?php
            } ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready( function() {
      var exchang = parseInt(localStorage.getItem("slexchange")) ;
      setCookie('exchange',exchang);
      console.log(exchang);
        $('.tip').tooltip();
        
    });

    function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";

    }
</script>
