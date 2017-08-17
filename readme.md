[![Build Status](https://travis-ci.org/unicalabs/agrippa.svg)](https://travis-ci.org/unicalabs/agrippa)

## Agrippa

Agrippa is a PHP-based secret sharing mechanism. Named after the work of [William Gibson](https://en.wikipedia.org/wiki/Agrippa_(A_Book_of_the_Dead)), Agrippa operates on the principle that sharing a temporary link to sensitive information is better than having the sensitive information itself persist in email, chat, or any other insecure communications channel.

For more information, visit [the homepage](http://unicalabs.github.io/agrippa/) or jump straight to the [Quick Start](http://unicalabs.github.io/agrippa/quickstart.html).

## Overview

#### 1. The secret is submitted with an expiration date/time and a view limit.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/1.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/1.png)

#### 2. The submitter receives a link that can be shared with the intended recipient.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/2.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/2.png)

#### 3. The recipient is able to use the link to retrieve the secret.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/3.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/3.png)

#### 4. The expiration and view limits are checked each time the secret is retrieved.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/4.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/4.png)

#### 5. Past the expiry or view limits, the secret is deleted and cannot be retrieved.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/5.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/5.png)

## Maintainer
Agrippa is maintained by [Unica Labs, LLC](http://unicalabs.com).

## License
Distributed under the [MIT license](license.md).
