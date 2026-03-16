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
        INGRID BURGER | ROLE: DESIGNER & CODER | TIME: 10 WEEKS <br>
        TOOLS: FIGMA, HTML, CSS, JAVASCRIPT, PHP, MYSQL, MICROSOFT TEAMS, GITHUB, GOOGLE FORMS, ZOOM
        </p>
        <section class="case-section">
            <h2 class="case-subheading">overview</h2>

            <p class="case-text">This project focused on designing and developing a mobile-first web application that allows users to browse a Food Truck’s menu, customize an order, checkout, and generate a receipt for pickup. The project was completed in User Experience Design II (IDM 216), where teams transformed earlier Figma prototypes into fully functioning web applications using a structured production pipeline.</p>

            <p class="case-text">Our team, Flare, built upon a mobile app concept for Pete’s Little Lunch Box originally designed in User Experience Design I (IDM 215). The goal of IDM 216 was to convert that prototype into a working web application supported by a database and interactive functionality.</p>

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

            <p class="case-text">My primary role was Designer, where I focused on UX/UI decisions, interface design, and visual consistency across the application. I was responsible for translating the high-fidelity Figma prototype from IDM 215 into the application's front-end interface by implementing the layouts and styling using HTML and CSS. My secondary role was Coder, where I supported development tasks including assisting with PHP functionality and working with MySQL data to ensure menu items and customization options were properly integrated with the interface.</p>

            <p class="case-text">The project progressed through several phases:</p>
            <ul>
                <li>Team formation and project setup</li>
                <li>Prototype refinement and planning</li>
                <li>Alpha development and usability testing</li>
                <li>Beta development and usability testing</li>
                <li>Final development and deployment</li>
            </ul>

            <p class="case-text">To support collaboration, we used Microsoft Teams for communication and task management and GitHub for version control. I collaborated closely with the development workflow by implementing front-end interface components and ensuring the design translated accurately into code while maintaining visual consistency across the application.</p>

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

            <p class="case-text">Beyond the product itself, the technical implementation required complex JavaScript functionality for cart management, dynamic pricing calculations, and real-time updates. From a design and front-end perspective, I focused on structuring the interface so customization options, menu selections, and pricing updates were communicated clearly to users. This required translating the visual prototype into front-end layouts that worked seamlessly with the application's dynamic functionality.</p>

            <p class="case-text">Without proper code structure and responsive design implementation, the application could easily become slow, buggy, or difficult to use across different devices.</p>
            
            <p class="case-text">An additional challenge was coordinating development work across team members while maintaining code quality and preventing conflicts through version control.</p>




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

        <section class="case-section">
            <h2 class="case-subheading">process and insight</h2>

            <h3>Interface Design & Front-End Implementation</h3>

            <p class="case-text">As the primary designer, I focused on translating the Figma prototype into a functional interface for the application. I implemented the front-end structure and styling using HTML and CSS, building the layouts that allow users to browse menu items, customize selections, and move through the ordering process.</p>

            <p class="case-text">Key functionality implementations included:</p>
            <ul>
                <li>Converting the IDM 215 Figma prototype into functional front-end pages</li>
                <li>Implementing the interface structure and styling using HTML and CSS</li>
                <li>Maintaining visual consistency across all application screens</li>
                <li>Structuring the lunchbox, checkout, and confirmation pages</li>
                <li>Supporting PHP functionality and MySQL menu integration</li>
            </ul>

            <p class="case-text">This work involved translating the visual prototype into a working interface that communicates ordering choices clearly to users. By implementing the front-end structure and styling, the interface preserved the design system while supporting the application's dynamic ordering functionality.</p>

             <div class="imgs">
                <p>From Design to Development</p>
                <img src="images/des-to-dev.webp" alt="From Design to Development">
            </div>

            <h3>Static Prototypes & Key Page Design</h3>

            <p class="case-text">As the primary designer, I created static prototypes for the most critical pages in the user journey and translated these designs into front-end code. These prototypes helped define the structure and hierarchy of the interface before dynamic functionality was implemented.</p>

            <p class="case-text">These pages required careful UX consideration because they represent the most critical steps in the ordering process. I focused on ensuring that the interface supported clear decision-making and smooth progression through the checkout flow.</p>

            <div class="imgs">
                <p>Static HTML Prototypes</p>
                <img src="images/static-html.webp" alt="Static HTML prototypes" class="case-image">
            </div>

            <h3>Backend Development & Database Setup</h3>

            <p class="case-text">In my secondary role as a coder, I supported backend functionality related to the menu system. This included assisting with PHP logic and working with MySQL data to ensure menu items, customization options, and pricing information were correctly connected to the front-end interface.</p>

            <p class="case-text">Backend contributions included:</p>
            <ul>
                <li>Structuring PHP queries to retrieve menu categories and items from the database</li>
                <li>Implementing loops that dynamically display menu items within their correct categories</li>
                <li>Converting static HTML menu layouts into dynamic templates that render database-driven content</li>
                <li>Ensuring menu data, categories, and item options were displayed correctly across the application</li>
            </ul>

            <p class="case-text">This work ensured that the menu interface could dynamically display the correct number of items, categories, and customization options directly from the database. By structuring how data was queried and rendered in PHP, the front-end interface could respond to changes in the database without requiring manual updates to the HTML structure.</p>

            <div class="imgs">
                <p>Retrieving Menu Categories & Items From the DB Using PHP</p>
                <img src="images/item-code-snippet.webp" alt="">
            </div>

            <h3>Testing & Iteration</h3>

            <p class="case-text">As part of my design role, I helped conduct several usability testing sessions to evaluate how users interacted with the interface and ordering flow. Observing users navigate the application helped identify areas where layout structure, customization options, and navigation could be improved.</p>

            <p class="case-text">Based on testing feedback, I implemented changes including:</p>
            <ul>
                <li>Refining the ordering system workflow for better user understanding</li>
                <li>Improving customization interface clarity</li>
                <li>Enhancing the checkout flow based on user confusion points</li>
                <li>Optimizing the order confirmation process for clarity</li>
            </ul>

            <p class="case-text">These testing insights helped refine the interface and improve the overall usability of the ordering experience..</p>

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

            <p class="case-text">The project highlighted the importance of translating interface design into functional web applications. Through my role as the primary designer, converting the Figma prototype into HTML and CSS front-end code ensured that the final application maintained its visual design while supporting a clear and intuitive ordering process.</p>

            <p class="case-text">Usability testing proved valuable in identifying areas where interface clarity and interaction design could improve before final implementation.</p>

            <p class="case-text">Overall, the project demonstrates how UX/UI design, technical development, and collaborative workflows can transform early prototypes into fully realized digital products.</p>
           
            <div class="imgs">
                <p>Final Application Screens</p>
                <img src="images/hero.webp" alt="Final Application Screens">
            </div>

           <h3>Project Links</h3>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/team" target="_blank">Team Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/" target="_blank">Project Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/data/" target="_blank">Database Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/app/microinteractions.html" target="_blank">Microinteractions Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/order.php" target="_blank">Main Menu Ordering Web Page</a></p>
            <p class="case-text"><a href="https://digmstudents.westphal.drexel.edu/~sej84/idm216/app/home.php" target="_blank">Final Web Page</a></p>

            <img src="images/3-graphics.webp" alt="Final Application Graphics" class="case-image">
        </section>
</body>
</html>