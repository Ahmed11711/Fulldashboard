export const fields = [
  { key: "user_id", label: "User Id", required: 1, placeholder: "Enter User Id", type: "number", isString: false },
  { key: "sub_category_id", label: "Sub Category Id", required: 1, placeholder: "Enter Sub Category Id", type: "number", isString: false },
  { key: "quantity", label: "Quantity", required: 1, placeholder: "Enter Quantity", type: "text", isString: false },
  { key: "price", label: "Price", required: 1, placeholder: "Enter Price", type: "number", isString: false },
  { key: "status", label: "Status", required: 1, placeholder: "Enter Status", type: "select", isString: false,
      options: [
    {
        "value": "pending",
        "label": "Pending"
    },
    {
        "value": "confirmed",
        "label": "Confirmed"
    },
    {
        "value": "processing",
        "label": "Processing"
    },
    {
        "value": "completed",
        "label": "Completed"
    },
    {
        "value": "cancelled",
        "label": "Cancelled"
    }
] },
  { key: "payment_status", label: "Payment Status", required: 1, placeholder: "Enter Payment Status", type: "select", isString: false,
      options: [
    {
        "value": "unpaid",
        "label": "Unpaid"
    },
    {
        "value": "paid",
        "label": "Paid"
    },
    {
        "value": "failed",
        "label": "Failed"
    },
    {
        "value": "refunded",
        "label": "Refunded"
    }
] },
  { key: "payment_method", label: "Payment Method", required: 1, placeholder: "Enter Payment Method", type: "text", isString: false },
  { key: "desc", label: "Desc", required: 1, placeholder: "Enter Desc", type: "textarea", isString: false }
];