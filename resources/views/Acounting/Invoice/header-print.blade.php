<table >
    <tr >
        <td class="myco">
            <img  style="max-width:260px;" src="{{ public_path() . '/Images/logo.png' }}">
        </td>
        <td class="myw">
            <table class="top_sum">
                <tr>
                    <td colspan="1" class="t_center"><h2 ><?php _('Invoice') ?></h2><br><br></td>
                </tr>
                <tr>
                    <td><?php echo __('lang.Invoice_Number') ?></td><td><?php echo $invoice['tid'] ?></td>
                </tr>
                <tr>
                    <td><?php echo __('lang.Invoice_Date') ?></td><td><?php echo $invoice['invoicedate'] ?></td>
                </tr>
                <tr>
                    <td><?php echo __('lang.Invoice_Due_Date') ?></td><td><?php echo $invoice['invoiceduedate'] ?></td>
                </tr>

            </table>

        </td>
    </tr>
</table>