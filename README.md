# matomoapi
TYPO3 extension to connect to the Matomo API and show the result using a Fluid template.

## Requirements
- TYPO3 CMS 10.4
- PHP 7.2+
- Licence: GPL 3.0

## Manual

After installing the extension you need to configure the Matomo API call through TypoScript. You can then add the plugin, either through TypoScript or as a content element. The default template will show the returned data using f:debug, so most likely you'll want to create a custom template.

More about the Matomo API can be found here: https://developer.matomo.org/api-reference/reporting-api

### TypoScript

| Key                    | Description                              | Type   |
| ---------------------- | ---------------------------------------- | ------ |
| view.templateRootPaths | Template root paths                      | Array  |
| view.partialRootPaths  | Partial root paths                       | Array  |
| view.layoutRootPaths   | Layout root paths                        | Array  |
| settings.apiUrl        | URL for the Matomo API                   | String |
| settings.tokenAuth     | The Matomo API authentication token      | String |
| settings.method        | The method to call in the Matomo API     | String |
| settings.parameters    | The parameters to send to the Matomo API | Array  |

### Examples

#### Get the number of visits in the last 30 days

##### TypoScript
```
plugin.tx_matomoapi {
  settings {
    apiUrl = https://example.org/matomo/index.php?
    tokenAuth = 1234567890abcdef1234567890abcdef
    method = VisitsSummary.get
    parameters {
      idSite = 1
      period = range
      date = last30
    }
  }
}
```

##### Fluid template
```xml
<html xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers">
<f:layout name="Default" />

<f:section name="Content">
    Visits in the last 30 days: {data.nb_visits}
</f:section>
</html>
```

#### Get the most visited page URL for yesterday

##### TypoScript
```
plugin.tx_matomoapi {
  settings {
    apiUrl = https://example.org/matomo/index.php?
    tokenAuth = 1234567890abcdef1234567890abcdef
    method = Actions.getPageUrls
    parameters {
      idSite = 1
      period = day
      date = yesterday
      flat = 1
      filter_limit = 1
    }
  }
}
```

##### Fluid template
```xml
<html xmlns:f="http://typo3.org/ns/TYPO3/CMS/Fluid/ViewHelpers">
<f:layout name="Default" />

<f:section name="Content">
    <f:if condition="{data.0}">
        <f:then>
            <a href="{data.0.url}">Most visited page yesterday</a>
        </f:then>
        <f:else>
            There were no visitors yesterday or something went wrong
        </f:else>
    </f:if>
</f:section>
</html>
```
