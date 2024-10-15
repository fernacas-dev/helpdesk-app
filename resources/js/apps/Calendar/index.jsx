import React, { Suspense } from "react";
import ReactDOM from "react-dom/client";

// Lazy loading para cargar los componentes solo cuando se necesiten
const ReactBigCalendar = React.lazy(() => import("./ReactBigCalendar"));
// const FullCalendar = React.lazy(() => import("./FullCalendar"));
// const TuiCalendar = React.lazy(() => import("./TuiCalendar"));
// const ReactCalendar = React.lazy(() => import("./ReactCalendar"));

if (document.getElementById("calendar")) {
    ReactDOM.createRoot(document.getElementById("calendar")).render(
        <React.StrictMode>
            <Suspense fallback={<div>Loading...</div>}>
                <ReactBigCalendar />
                {/* <FullCalendar /> */}
                {/* <TuiCalendar /> */}
                {/* <ReactCalendar /> */}
            </Suspense>
        </React.StrictMode>
    );
}
