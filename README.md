## Task
Design and implement a domain service that will process these three delivery orders and return appropriate types of objects based on the delivery type with
the following specifications:
* Each delivery type can have a different workflow.
* Delivery with “enterpriseDelivery” type needs to be sent off to a 3rd party API
for validation of the enterprise.
* Delivery order coming from an email campaign needs to communicate with a
separate marketing service indicating the success of the given email campaign.

## Design
Different workflows are encapsulated in different processors under `App\Services\Delivery\Processors`, which share the same interface `App\Contracts\Delivery\Processor`.

A list of orders can be passed to `App\Services\Delivery\DeliveryService` to process. For each order, the `deliveryType` key is checked, and the corresponding `Processor` is loaded to process the order with different workflows.

External services e.g. `App\Services\Enterprise\FooEnterpriseValidationService` and `App\Services\Marketing\BarMarketingService`  encapsulate vendor specific implementation. They implement interfaces with minimal set of function(s) required to perform task. If service vendor is changed, we can simply add a new service class that implements the same interface for the new vendor, and update the bindings defined in `App\Application`.