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
                'size'  => 95
            ),

            array(
                'name'  => esc_html__( 'Facebook URL', 'reveal' ),
                'desc'  => esc_html('Enter facebook url', 'reveal' ),
                'id'    => $prefix . 'team_facebook',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => esc_html__( 'Twitter URL', 'reveal' ),
                'desc'  => esc_html('Enter Twitter URL', 'reveal' ),
                'id'    => $prefix . 'team_twitter',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => esc_html__( 'Instagram URL', 'reveal' ),
                'desc'  => esc_html('Enter Instagram URL', 'reveal' ),
                'id'    => $prefix . 'team_ig',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

        array(
                'name'  => esc_html__( 'Google Plus URL', 'reveal' ),
                'desc'  => esc_html('Enter Google Plus URL', 'reveal' ),
                'id'    => $prefix . 'team_gp',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
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
                'size'  => 95
            ),

            array(
                'name'  => esc_html__( 'Project Date', 'reveal' ),
                'desc'  => esc_html('Enter project date. Example: 14-Apr-17', 'reveal' ),
                'id'    => $prefix . 'portfolio_date',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => esc_html__( 'Project Skills', 'reveal' ),
                'desc'  => esc_html('Enter project skills', 'reveal' ),
                'id'    => $prefix . 'portfolio_skills',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),


            array(
                'name'  => esc_html__( 'Project Site Name', 'reveal' ),
                'desc'  => esc_html('Enter project site name', 'reveal' ),
                'id'    => $prefix . 'portfolio_sname',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
            ),

            array(
                'name'  => esc_html__( 'Project Site URL', 'reveal' ),
                'desc'  => esc_html('Enter project site URL', 'reveal' ),
                'id'    => $prefix . 'portfolio_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 95
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
                'size'  => 95
            ),



        )
    );

    return $meta_boxes;
}

