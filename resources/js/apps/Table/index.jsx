import React from "react";
import ReactDOM from "react-dom/client";
import TableApp from "../../components/Table/TableApp";

if (document.getElementById("table-app")) {
    ReactDOM.createRoot(document.getElementById("table-app")).render(
        <React.StrictMode>
            <TableApp />
        </React.StrictMode>
    );
}
