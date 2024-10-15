import React, { Suspense } from "react";
import ReactDOM from "react-dom/client";

// Lazy loading para cargar los componentes solo cuando se necesiten
const ReactBigCalendar = React.lazy(() =>
    import("./Calendar/ReactBigCalendar")
);
// const FullCalendar = React.lazy(() => import("./Calendar/FullCalendar"));
// const TuiCalendar = React.lazy(() => import("./Calendar/TuiCalendar"));
// const ReactCalendar = React.lazy(() => import("./Calendar/ReactCalendar"));

if (document.getElementById("calendar")) {
    ReactDOM.createRoot(document.getElementById("calendar")).render(
        <React.StrictMode>
            {/* Suspense muestra un fallback (por ejemplo, un "Loading...") mientras se cargan los componentes */}
            <Suspense fallback={<div>Loading...</div>}>
                <ReactBigCalendar />
                {/* <FullCalendar /> */}
                {/* <TuiCalendar /> */}
                {/* <ReactCalendar /> */}
            </Suspense>
        </React.StrictMode>
    );
}
