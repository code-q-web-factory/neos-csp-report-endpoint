# Flow Consent Security Policy (CSP) Violation Report Endpoint

This package adds an endpoint to the [Flow](https://neos.io) framework to log content security policy (CSP) violations. It simply logs every request that is sent to the endpoint in the [defined format](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Content-Security-Policy).

## Usage

To use this endpoint, extend your `Content-Security-Policy` header to contain `report-uri /csp-violation-report/`.

## Maintainers

[Felix Gradinaru, CodeQ Web Factory](https://codeq.at)

## License

This package is distributed under the MIT license.
