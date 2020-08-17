SimpleSAMLphp SAML ErrorResponse generator

This package can be used to generate SAML ErrorResponses in a controlled way.
Useful when testing SP Error handling.

Configuration

```
'authproc' => array(
    0 => array(
       'class' => 'error:ErrorResponse',
       'status' => SAML2\Constants::STATUS_RESPONDER,
       'code' => 'Foo Code',
       'message' => 'Foo Message'
    ),
```
