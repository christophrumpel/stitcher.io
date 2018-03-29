<feed xmlns="http://www.w3.org/2005/Atom">
    <id>https://www.stitcher.io/rss</id>
    <link href="https://www.stitcher.io/rss"/>
    <title>
        <![CDATA[ stitcher.io ]]>
    </title>
    <updated>{date('c')}</updated>
    {foreach $posts as $post}
        <entry>
            <title>
                <![CDATA[ {$post.title} ]]>
            </title>

            <link rel="alternate" href="https://www.stitcher.io/blog/{$post.id}"/>

            <id>
                https://www.stitcher.io/blog/{$post.id}
            </id>

            <author>
                <name>
                    <![CDATA[ Brent Roose ]]>
                </name>
            </author>

            <summary type="html">
                <![CDATA[ {$post.content} ]]>
            </summary>
        </entry>
    {/foreach}
</feed>
