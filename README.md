INVENTORY MANAGEMENT
---------------------------

    TYPES OF QUANTITIES
    ----------------------------------------------------------------
Quantity On Hand: This number is the total you have physically available (including Qty Reserved), minus any items that have already been “picked” in a sales order (i.e. what’s still on your warehouse shelves).

Quantity Picked: This number is the total that has already been picked in sales orders/work orders and are awaiting shipment (think of them as sitting in a box waiting to be shipped out).

Quantity Reserved: This number is the total ordered by your customers (across all open sales orders/work orders). This number is what you need to be fulfilling to complete sales/production!

Quantity Available: This number is how many of the item you have left if you fulfill all open sales orders and is therefore equal to Qty on Hand – Qty Reserved. (i.e. what’s left after you’ve shipped all your current orders).

If it’s a positive number then you can see how many you have left to sell to future customers and new sales orders.
If it’s a negative number it’s a good indicator that you don’t have enough to fulfill all open sales orders, and that you need to reorder more stock.
Quantity on Order: This number is how many you’ve ordered from your supplier/vendor but haven’t received. This also includes quantities of items being made in a work order.

Quantity in Transit: This is specifically items that have been sent via Transfer Stock and are still in the “Transit” status (i.e. you’ve sent the transfer but it has not been received at the other location yet).

*Quantity Owned: This number is your overall total. It can be found only in the Inventory Summary Report/Historical Inventory Report, and it is equal to the total of Qty On Hand + Qty Picked.

*Current Anticipated Quantity: This number is shown in the Reorder Stock window. It’s how inFlow determines whether or not you need to reorder more stock. The formula quantity on hand – quantity reserved + quantity on order. This way, it takes into account all physical items, subtracts the number you need to fulfill to your customers, and adds the number you already have on open purchase orders.

Quantity Used: This Quantity is only shown on the Estimated Inventory Duration report. This Quantity is the number of products sold or used in a Work Order during the time period designated on the report.