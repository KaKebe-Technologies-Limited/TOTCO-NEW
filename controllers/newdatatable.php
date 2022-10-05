{
    data: 'orderstatus',
    width: '150px',
    render: function(data, type, full, meta) {
        return `<div class="badge badge-success">${full.orderstatus}</div>`;
    }

},
{
    data: 'action',
    render: function(data, type, full, meta){
        if(type === 'display'){
        data = data + `<a title="View sales order" class="btn btn-primary mx-1" href="single-order?id=${full.orderid} "><i class="fas fa-eye text-white"></i></a>`+
        `<a title="Download sales order invoice" class="btn btn-secondary mx-1" href="#"><span><i class="fas fa-download text-white"></i></span></a>` +
                            `<button class="btn btn-danger mx-1" id="delete-order-btn" type="button"><span><i class="fas fa-trash text-white"></i></span></button>`
        }

        return data;
    }
}
