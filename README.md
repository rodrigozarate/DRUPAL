# Modules to display JSON objects in Drupal
## List
Get the info from https://www.zarate.com.co/api/films
## Post
Get the info from https://www.zarate.com.co/api/films/{id}

More info to fetch in

https://www.zarate.com.co/api/directors
https://www.zarate.com.co/api/producer

### Blog explainig the project:

[Medium][medium]

<img alt="Drupal Logo" src="https://www.drupal.org/files/Wordmark_blue_RGB.png" height="60px">

Drupal is an open source content management platform supporting a variety of
websites ranging from personal weblogs to large community-driven websites. For
more information, visit the Drupal website, [Drupal.org][Drupal.org], and join
the [Drupal community][Drupal community].

## Contributing

Drupal is developed on [Drupal.org][Drupal.org], the home of the international
Drupal community since 2001!

[Drupal.org][Drupal.org] hosts Drupal's [GitLab repository][GitLab repository],
its [issue queue][issue queue], and its [documentation][documentation]. Before
you start working on code, be sure to search the [issue queue][issue queue] and
create an issue if your aren't able to find an existing issue.

Every issue on Drupal.org automatically creates a new community-accessible fork
that you can contribute to. Learn more about the code contribution process on
the [Issue forks & merge requests page][issue forks].

## Usage

Download and extract

Copy the list_module and post_module directories inside your modules directory in your own Drupal instalation

Activate the modules by checking the tick marks in the extend menu of the admin panel.

Access the list by visiting you instalation on the browser at /articlelist/page
### ie https://localhost:8443/articlelist/page

Access each film dedicated page by visiting you instalation on the browser at /post/{id} 
### ie https://localhost:8443/post/1


Learn about the [Drupal trademark and logo policy here][trademark].

[Drupal.org]: https://www.drupal.org
[Drupal community]: https://www.drupal.org/community
[GitLab repository]: https://git.drupalcode.org/project/drupal
[issue queue]: https://www.drupal.org/project/issues/drupal
[issue forks]: https://www.drupal.org/drupalorg/docs/gitlab-integration/issue-forks-merge-requests
[documentation]: https://www.drupal.org/documentation
[changelog]: https://www.drupal.org/list-changes/drupal
[modules]: https://www.drupal.org/project/project_module
[security advisories]: https://www.drupal.org/security
[security RSS]: https://www.drupal.org/security/rss.xml
[security team]: https://www.drupal.org/drupal-security-team
[service providers]: https://www.drupal.org/drupal-services
[support]: https://www.drupal.org/support
[trademark]: https://www.drupal.com/trademark
[medium]: https://medium.com/@rodrigozaratealgecira/drupal-9-fetch-and-display-nodes-from-api-tutorial-74920e4e150f
