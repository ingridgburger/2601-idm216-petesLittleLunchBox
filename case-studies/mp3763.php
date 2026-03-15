<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pete's Little Lunch Box | Case Study</title>
    <link rel="icon" type="image/svg+xml" href="../images/flare-logos/favicon.png">
    <link rel="stylesheet" href="css/case-study.css">
    <link rel="stylesheet" href="../app/css/components.css">
</head>
<body>
    <div class="hero">
        <img src="images/hero.webp" alt="">
    </div>
        
    <div class="case-study-container">
        <h1 class="case-title">pete's little lunch box</h1>
        <p class="case-study-details">
        MIHIKA PATEL | ROLE: DATA ARCHITECT & PROJECT MANAGER | TIME: 10 WEEKS <br>
        TOOLS: FIGMA, HTML, CSS, MICROSOFT TEAMS, GITHUB, MAMP, GOOGLE FORMS, ZOOM
        </p>
        <section class="case-section">
            <h2 class="case-subheading">overview</h2>

            <p class="case-text">This project focused on designing and developing a mobile-first web application that allows users to browse a Food Truck's menu, customize an order, checkout, and generate a receipt for pickup. The project was completed in User Experience Design II (IDM 216), where teams transformed earlier Figma prototypes into fully functioning web applications using a structured production pipeline.</p>

            <p class="case-text">Our team, Flare, built upon a mobile app concept for Pete's Little Lunch Box originally designed in User Experience Design I (IDM 215). The goal of IDM 216 was to convert that prototype into a working web application supported by a database and interactive functionality.</p>

            <p class="case-text">The main challenge was translating the prototype into a functional system while maintaining strong user experience principles. Our team coordinated design, development, database architecture, and usability testing in a fast-paced collaborative environment.</p>

            <p class="case-text">The final result was a responsive ordering experience supported by a structured database and interactive interface. Through two rounds of usability testing and iterative improvements, the application evolved into a clear ordering system that allows users to select menu items, customize options, calculate totals, and complete purchases. The project demonstrates how collaborative UX/UI workflows, structured project management, and iterative testing can transform early design concepts into functional digital products.</p>
        </section>

        <div class="imgs">
            <p>Main Application Screens</p>
            <img src="images/overview.webp" alt="">
        </div>


        <section class="case-section">
            <h2 class="case-subheading">context and challenge</h2>

            <h3>Background</h3>

            <p class="case-text">This project was completed over a 10-week academic term in IDM 216, which focuses on converting Figma prototypes into fully functioning web applications. Our team followed a structured workflow that included planning, design development, coding, database integration, and usability testing.</p>

            <p class="case-text">Our team, Flare, consisted of four members with overlapping roles:</p>
            <ul>
                <li>Project Managers: workflow coordination and task management</li>
                <li>Designers: UX/UI design and usability testing</li>
                <li>Coders: front-end and back-end development</li>
                <li>Data Architects: project asset organization and data structure</li>
            </ul>

            <p class="case-text">Each member held both a primary and secondary role to support collaboration throughout the project.</p>

            <!-- Change this paragraph so it's specific to you -->
            <p class="case-text">My primary role was Data Architect, where I helped to ideate the most efficient ways to organize database information and prepare image assets used in the data tables. My secondary role was Project Manager, where I coordinated workflows, managed tasks, and ensured the team stayed organized and on schedule.</p>

            <p class="case-text">The project progressed through several phases:</p>
            <ul>
                <li>Team formation and project setup</li>
                <li>Prototype refinement and planning</li>
                <li>Alpha development and usability testing</li>
                <li>Beta development and usability testing</li>
                <li>Final development and deployment</li>
            </ul>

            <!-- Change this paragraph so it's specific to you -->
            <p class="case-text">To support collaboration, we used Microsoft Teams for communication and task management and GitHub for version control. I helped to organize our Teams workspace specifically through the shared (files) and wiki tabs, shared posts to communicate with my team, checked the planner board, and ensured project links, files, and documentation remained updated.</p>

            <p class="case-text">Development began with a high-fidelity Figma prototype created in IDM 215, which defined the application's brand design, interface structure, navigation flow, and interaction patterns.</p>

            <div class="imgs">
                <p>Figma Prototype</p>
                <img src="images/figma_file.webp" alt="">
            </div>

            <h3>The Problem</h3>

            <p class="case-text">The core challenge was transforming a Figma prototype into a fully functional ordering application while maintaining usability and clear interaction flows.</p>

            <p class="case-text">The application needed to:</p>
            <ul>
                <li>Allow users to browse menu items</li>
                <li>Provide customization options that affect price</li>
                <li>Guide users through the ordering process</li>
                <li>Calculate totals including tax</li>
                <li>Simulate checkout and payment</li>
                <li>Display a receipt for order pickup</li>
            </ul>

            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">Beyond the product itself, our team also had to manage a collaborative workflow involving multiple roles, organized files, and clear communication. As Data Architect, I helped keep the team aligned by keeping our files organized in an intuitive way through naming conventions and folder structure while also ensuring the most current information is displayed at all times.</p>

            <p class="case-text">Without strong organization and iterative testing, integrating design, code, and data could easily create usability issues or development bottlenecks.</p>
            <div class="imgs">
                <p>Microsoft Teams Shared Files Tab</p>
                <img src="images/shared_tab_naming_conventions.webp" alt="">
            </div>

            <h3>Goals & Objectives</h3>

            <p class="case-text">Our project established several key goals to guide development and measure success.</p>

            <p class="case-text">User Experience Goals</p>
            <ul>
                <li>Provide a clear and intuitive ordering flow</li>
                <li>Ensure menu selections and customization options are easy to understand</li>
                <li>Minimize user confusion during navigation and checkout</li>
            </ul>

            <p class="case-text">Technical Goals</p>
            <ul>
                <li>Build a responsive mobile-first web application</li>
                <li>Integrate menu data through structured database tables</li>
                <li>Implement ordering features including item selection and total calculation</li>
            </ul>

            <p class="case-text">Process Goals</p>
            <ul>
                <li>Maintain organized workflows through collaborative tools</li>
                <li>Track tasks and responsibilities throughout the project lifecycle</li>
                <li>Use usability testing feedback to improve the Alpha and Beta builds</li>
            </ul>

            <p class="case-text">Success was defined by delivering a fully functional web application that demonstrated both technical functionality and strong UX/UI design principles.</p>

        </section>

        <!-- Change this entire "process and insight" section so it's specific to you -->
        <section class="case-section">
            <h2 class="case-subheading">process and insight</h2>

            <h3>Data Architecture</h3>

            <p class="case-text">As the primary Data Architect, I was responsible for organizing the application's data structure and preparing the image assets associated with menu items. My goal was to design a system that could clearly organize a large amount of menu and customization data while remaining intuitive for developers to implement in code.</p>

            <p class="case-text">To accomplish this, I structured the application's database into several key tables that organized menu items and their customization options.</p>

            <ul>
                <li>menu categories</li>
                <li>menu items</li>
                <li>bagel options</li>
                <li>cheese options</li>
                <li>topping options</li>
                <li>bread options</li>
                <li>dressing options</li>
                <li>size options</li>
            </ul>

            <p class="case-text">I compiled all of the data into an Excel spreadsheet to create a clear and easily referenceable structure. Within the spreadsheet, I organized tables so they could connect through primary and foreign keys during code integration. Maintaining consistent naming conventions and structured formatting helped simplify database imports and ensured alignment between the design assets and backend functionality.</p>

            <div class="imgs">
                <p>Spreadsheet Database Structure</p>
                <img src="images/db.webp" alt="">
            </div>

            <p class="case-text">The secondary Data Architect and I also created a dedicated tab within our Figma file to collect all image assets in one place. After gathering the images, we optimized them and added them to the spreadsheet alongside their corresponding menu items. This streamlined the implementation process and allowed developers to quickly reference both the data and assets while building the final application.</p>
            
            <div class="imgs">
                <p>Image Gathering & Organization in Figma</p>
                <img src="images/figma_file_images_tab.webp" alt="">
            </div>

            <h3>Project Management & Collaboration</h3>

            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">Strong coordination was essential for keeping our team aligned throughout the project timeline. As the secondary Project Manager, I supported the primary Project Manager by helping maintain our Microsoft Teams workspace, which served as the central hub for communication, file organization, and task tracking.</p>

            <p class="case-text">The workspace included:</p>
            <ul>
                <li>A Wiki tab containing key project links</li>
                <li>A Files tab for shared assets and documentation</li>
                <li>A Planner tab with Kanban-style task buckets</li>
            </ul>

            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">I assisted with managing tasks in the Planner board by reviewing progress, checking deadlines, and ensuring links to deliverables were included within each task. This helped keep project documentation organized and allowed the team to easily track ongoing work and upcoming responsibilities.</p>

            <div class="imgs">
                <p>Microsoft Teams Wiki Tab - Link Management</p>
                <img src="images/wiki_tab.webp" alt="">
            </div>
           
            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">Communication primarily occurred through the Posts channel, where the team shared updates, coordinated tasks, and clarified questions. In my supporting role, I helped monitor discussions and ensure that important updates, resources, and deadlines remained visible and accessible to everyone on the team.</p>

            <h3>Design & Prototype Development</h3>

            <p class="case-text">The design process focused on refining the mobile-first ordering interface for Pete's Little Lunch Box. Using the IDM 215 prototype, we defined the critical navigation path users would follow when placing an order.</p>

            <p class="case-text">Design activities included:</p>
            <ul>
                <li>Updating interface layouts in Figma</li>
                <li>Mapping navigation flows between screens</li>
            </ul>

            <p class="case-text">The prototype emphasized a streamlined ordering process where users move from browsing the menu, to selecting options, to checkout and order confirmation.</p>
     
            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">While the designers led the design process, I helped by implementing small Figma adjustments based on instructor feedback before usability testing.</p>


            <h3>Development</h3>

            <p class="case-text">Development focused on building the responsive interface and integrating database content.</p>

            <p class="case-text">Front-end development included:</p>
            <ul>
                <li>Mobile-first layouts</li>
                <li>Interactive navigation</li>
                <li>Styled buttons, forms, and menus</li>
            </ul>

            <p class="case-text">Back-end development included:</p>
            <ul>
                <li>Creating database tables</li>
                <li>Importing structured data</li>
                <li>Displaying menu information dynamically</li>
                <li>Implementing ordering functionality</li>
            </ul>

            <p class="case-text">The system allows users to select menu items, customize options, checkout, and calculate the final order total.</p>

            <p class="case-text">Although the coders dominated this part of the project, I aided in creating some of the baseline frontend screens of our critical path through HTML and CSS.</p>

            <h3>Usability Testing</h3>

            <p class="case-text">Two rounds of usability testing were conducted to identify usability issues and guide improvements.</p>

            <p class="case-text">Each round included three participants, totaling six usability tests.</p>

            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">As secondary Project Manager, I helped to find participants to volunteer for testing as well as schedule meetings with them.</p>

            <p class="case-text">During testing:</p>
            <ul>
                <li>A moderator guided participants through tasks</li>
                <li>Participants shared screens while interacting with the prototype</li>
                <li>Observers recorded responses in structured forms</li>
                <li>Sessions were recorded via Zoom</li>
            </ul>

            <!-- Change this paragraph so it's specific to you -->            
            <p class="case-text">I assisted by being the creator of the usability testing form, the moderator, and the observer. As Data Architect, I created a Google Form to test and named the file with our naming convention to ensure consistency. During Round 2 of usability testing, I served as the moderator for one test and observer for the other two tests.</p>

            <p class="case-text">Testing revealed navigation and interaction issues that were addressed before the Beta build, helping confirm a clearer user flow.</p>

        </section>


        <section class="case-section">
            <h2 class="case-subheading">solution</h2>

            <p class="case-text">The final product is a mobile-first ordering web application for Pete's Little Lunch Box. Key features include:</p>
            
            <p class="case-text"><strong>Interactive Menu Selection:</strong> Users can browse menu items with descriptions and prices and select multiple items in a single order.</p>

            <p class="case-text"><strong>Customization Options:</strong> Users can modify orders with options such as bagel type, toppings, spreads, and size, which dynamically affect pricing.</p>

            <p class="case-text"><strong>Real-Time Order Summary:</strong> The system calculates individual item prices, sales tax, and total order cost in real-time. The system calculates:</p>
            <ul>
                <li>individual item prices</li>
                <li>sales tax</li>
                <li>total order cost</li>
            </ul>

            <p class="case-text"><strong>Order Receipt:</strong> After checkout, users receive a receipt with a visible order number for pickup.</p>

            <p class="case-text">These features demonstrate how design, database architecture, and front-end functionality support a clear and efficient ordering experience.</p>

        </section>


        <section class="case-section">
            <h2 class="case-subheading">results</h2>

            <p class="case-text">The project successfully delivered a fully functional web application that met course requirements and demonstrated a complete UX/UI development pipeline.</p>

            <p class="case-text">Key outcomes included:</p>
            <ul>
                <li>A responsive ordering interface built with HTML, CSS, JavaScript, and PHP</li>
                <li>Integrated database tables for menu and customization options</li>
                <li>Iterative improvements from two rounds of usability testing</li>
                <li>Organized collaboration through Microsoft Teams and GitHub</li>
            </ul>

            <!-- Change this paragraph so it's specific to you -->
            <p class="case-text">This project reinforced the importance of both structured data organization and clear team coordination in collaborative development. As the primary Data Architect and secondary Project Manager, I learned how thoughtful data structuring, consistent naming conventions, and organized documentation can streamline development, while clear communication and task tracking help keep a team aligned and projects moving forward.</p>
            
            <p class="case-text">Usability testing proved valuable in identifying areas where interface clarity and interaction design could improve before final implementation.</p>

            <p class="case-text">Overall, the project demonstrates how UX/UI design, technical development, and collaborative workflows can transform early prototypes into fully realized digital products.</p>
           
            <div class="imgs">
                <p>Final Application Screens</p>
                <img src="images/hero.webp" alt="">
            </div>

           <h3>Project Links</h3>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/team" target="_blank">Team Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/" target="_blank">Project Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/data/" target="_blank">Database Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/app/microinteractions.html" target="_blank">Microinteractions Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/order.php" target="_blank">Main Menu Ordering Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/app/home.php" target="_blank">Final Web Page</a></p>

            <img src="images/3-graphics.webp" alt="" class="case-image">
        </section>
</body>
</html>