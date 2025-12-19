export const fields = [
  { key: "name", label: "Name", required: 1, placeholder: "Enter Name", type: "text", isString: false },
  { key: "email", label: "Email", required: 1, placeholder: "Enter Email", type: "text", isString: false },
  { key: "email_verified_at", label: "Email Verified At", required: 1, placeholder: "Enter Email Verified At", type: "text", isString: false },
  { key: "password", label: "Password", required: 1, placeholder: "Enter Password", type: "password", isString: false },
  { key: "phone", label: "Phone", required: 1, placeholder: "Enter Phone", type: "text", isString: false },
  { key: "active", label: "Active", required: 1, placeholder: "Enter Active", type: "boolean", isString: false },
  { key: "gender", label: "Gender", required: 1, placeholder: "Enter Gender", type: "select", isString: false,
      options: [
    {
        "value": "male",
        "label": "Male"
    },
    {
        "value": "female",
        "label": "Female"
    }
] },
  { key: "date_of_birth", label: "Date Of Birth", required: 1, placeholder: "Enter Date Of Birth", type: "text", isString: false },
  { key: "store_name", label: "Store Name", required: 1, placeholder: "Enter Store Name", type: "text", isString: false },
  { key: "percentage", label: "Percentage", required: 1, placeholder: "Enter Percentage", type: "number", isString: false },
  { key: "type", label: "Type", required: 1, placeholder: "Enter Type", type: "select", isString: false,
      options: [
    {
        "value": "user",
        "label": "User"
    },
    {
        "value": "admin",
        "label": "Admin"
    }
] },
  { key: "remember_token", label: "Remember Token", required: 1, placeholder: "Enter Remember Token", type: "text", isString: false }
];