[![Build Status](https://travis-ci.org/unicalabs/agrippa.svg)](https://travis-ci.org/unicalabs/agrippa)

## Agrippa

Agrippa is a PHP-based secret sharing mechanism. Named after the work of [William Gibson](https://en.wikipedia.org/wiki/Agrippa_(A_Book_of_the_Dead)), Agrippa operates on the principle that sharing a temporary link to sensitive information is better than having the sensitive information itself persist in email, chat, or any other insecure communications channel.

For more information, visit [the homepage](http://getagrippa.com).

## Overview

#### 1. The secret is submitted with an expiration and a view limit.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/1.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/1.png)

#### 2. The submitter receives a link to share.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/2.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/2.png)

#### 3. The link recipient is able to see the secret

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/3.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/3.png)

#### 4. The expiration and view limits are checked each time the secret is retrieved.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/4.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/4.png)

#### 5. Past the expiry or view limits, the secret is deleted and cannot be retrieved.

[![Step One](https://raw.githubusercontent.com/unicalabs/agrippa/gh-pages/images/5.png)](https://github.com/unicalabs/agrippa/blob/gh-pages/images/5.png)


## License
Distributed under the [MIT license](license.md).