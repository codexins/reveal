<?php
add_filter( 'rwmb_meta_boxes', 'reveal_register_meta_boxes' );

function reveal_register_meta_boxes( $meta_boxes ) {
    $prefix = 'reveal_';
    
    //1st meta box
    $meta_boxes[] = array(
        'id'         => 'reveal-team-member',
        'title'      => esc_html__( 'Team Member Information', 'reveal' ),
        'post_types' => array( 'team' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => esc_html__( 'Designation', 'reveal' ),
                'desc'  => esc_html('Enter Designation', 'reveal' ),
                'id'    => $prefix . 'team_designation',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Facebook URL', 'reveal' ),
                'desc'  => esc_html('Enter facebook url', 'reveal' ),
                'id'    => $prefix . 'team_facebook',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Twitter URL', 'reveal' ),
                'desc'  => esc_html('Enter Twitter URL', 'reveal' ),
                'id'    => $prefix . 'team_twitter',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'LinkedIn URL', 'reveal' ),
                'desc'  => esc_html('Enter LinkedIn URL', 'reveal' ),
                'id'    => $prefix . 'team_linkedin',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Instagram URL', 'reveal' ),
                'desc'  => esc_html('Enter Instagram URL', 'reveal' ),
                'id'    => $prefix . 'team_ig',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),


        )
    );

    $meta_boxes[] = array(
        'id'         => 'reveal-testimonail-meta',
        'title'      => esc_html__( 'Author Information', 'reveal' ),
        'post_types' => array( 'testimonial' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => esc_html__( 'Name', 'reveal' ),
                'desc'  => esc_html('Enter Name', 'reveal' ),
                'id'    => $prefix . 'author_name',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

        )

    );


    $meta_boxes[] = array(
        'id'         => 'reveal-portfolio-meta',
        'title'      => esc_html__( 'Portfolio Information', 'reveal' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => esc_html__( 'Client Name', 'reveal' ),
                'desc'  => esc_html('Enter client name', 'reveal' ),
                'id'    => $prefix . 'portfolio_client',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Project Date', 'reveal' ),
                'desc'  => esc_html('Enter project date. Example: 14-Apr-17', 'reveal' ),
                'id'    => $prefix . 'portfolio_date',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Project Skills', 'reveal' ),
                'desc'  => esc_html('Enter project skills', 'reveal' ),
                'id'    => $prefix . 'portfolio_skills',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),


            array(
                'name'  => esc_html__( 'Project Site Name', 'reveal' ),
                'desc'  => esc_html('Enter project site name', 'reveal' ),
                'id'    => $prefix . 'portfolio_sname',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Project Site URL', 'reveal' ),
                'desc'  => esc_html('Enter project site URL', 'reveal' ),
                'id'    => $prefix . 'portfolio_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),




        )
    );

    $meta_boxes[] = array(
        'id'         => 'reveal-page-background-meta',
        'title'      => esc_html__( 'Page Header Background Image', 'reveal' ),
        'post_types' => array( 'page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'      => esc_html__( 'Background Image', 'reveal' ),
                'desc'      => esc_html__('Upload Page Header Background Image', 'reveal'),
                'id'        => $prefix . 'page_background',
                'type'      => 'image_advanced',
                'clone'     => false,
            ),
        )
    );



    $meta_boxes[] = array(
        'id'         => 'reveal-client-logo-meta',
        'title'      => esc_html__( 'Client Information', 'reveal' ),
        'post_types' => array( 'clients' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(


            array(
                'name'  => esc_html__( 'Client Site URL', 'reveal' ),
                'desc'  => esc_html('Enter client site URL', 'reveal' ),
                'id'    => $prefix . 'clients_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),



        )
    );


    $meta_boxes[] = array(
        'id'         => 'reveal-event-meta',
        'title'      => esc_html__( 'Event Information', 'reveal' ),
        'post_types' => array( 'events' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(


            array(
                'name'  => esc_html__( 'Event Name', 'reveal' ),
                'desc'  => esc_html('Enter event name', 'reveal' ),
                'id'    => $prefix . 'event_name',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Event Start Date', 'reveal' ),
                'desc'  => esc_html('Enter event start date', 'reveal' ),
                'id'    => $prefix . 'event_start_date',
                'type'  => 'date',
                'clone' => false,
                'size'  => 100
            ),


            array(
                'name'  => esc_html__( 'Event Start Time', 'reveal' ),
                'desc'  => esc_html('Enter event start time', 'reveal' ),
                'id'    => $prefix . 'event_start_time',
                'type'  => 'time',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Event End Date', 'reveal' ),
                'desc'  => esc_html('Enter events end date', 'reveal' ),
                'id'    => $prefix . 'event_end_date',
                'type'  => 'date',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Event End Time', 'reveal' ),
                'desc'  => esc_html('Enter event end time', 'reveal' ),
                'id'    => $prefix . 'event_end_time',
                'type'  => 'time',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Contact Phone', 'reveal' ),
                'desc'  => esc_html('Enter phone number', 'reveal' ),
                'id'    => $prefix . 'event_phone',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Contact Email', 'reveal' ),
                'desc'  => esc_html('Enter email address', 'reveal' ),
                'id'    => $prefix . 'event_email',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Events Address', 'reveal' ),
                'desc'  => esc_html('Enter event location address', 'reveal' ),
                'id'    => $prefix . 'event_address',
                'type'  => 'textarea',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Events Location Latitude', 'reveal' ),
                'desc'  => esc_html('Enter event location latitude, you can find latitude/longitude by entering your address here', 'reveal' ),
                'id'    => $prefix . 'event_address_latitude',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => esc_html__( 'Events Location Longitude', 'reveal' ),
                'desc'  => esc_html('Enter event location longitude, you can find latitude/longitude by entering your address here', 'reveal' ),
                'id'    => $prefix . 'event_address_longitude',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),




        )
    );

    return $meta_boxes;
}

