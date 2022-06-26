## 🚀&nbsp; Setup

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/)
2. Run `docker-compose up -d` to start

#### Command Usages

Run `php bin/console app:task:pull` for pulling provider data to your database. Whenever you call with `-f` or `force` it will reset the `task` table from database.

#### Adding new provider to your app

You can create a service function in `App\Service\ProviderService`. You can use in your controller this function. So what does the service function looks like is;

```
    $this
        ->prepareResourceKeys('estimated_duration','level') //set your resource keys if different from default.
        ->usesKeyAsName() // if your response object uses key as name chain this
        ->setEndpoint('5d47f235330000623fa3ebf7') // your providers endPoint
        ->send(); // after everything configured send request to mock server
```

NOTE:
`App\Service\ProviderService` extends from `App\Abstracts\ProviderAbstract` you can check out what the default variables are. 
