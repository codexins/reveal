<?php
add_filter( 'rwmb_meta_boxes', 'reveal_register_meta_boxes' );

function reveal_register_meta_boxes( $meta_boxes ) {
    $prefix = 'reveal_';
    
    //1st meta box
    $meta_boxes[] = array(
        'id'         => 'reveal-team-member',
        'title'      => __( 'Team Member Information', 'reveal' ),
        'post_types' => array( 'team' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Designation', 'reveal' ),
                'desc'  => 'Enter Designation',
                'id'    => $prefix . 'team_designation',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Facebook URL', 'reveal' ),
                'desc'  => 'Enter facebook url',
                'id'    => $prefix . 'team_facebook',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Twitter URL', 'reveal' ),
                'desc'  => 'Enter Twitter URL',
                'id'    => $prefix . 'team_twitter',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'LinkedIn URL', 'reveal' ),
                'desc'  => 'Enter LinkedIn URL',
                'id'    => $prefix . 'team_linkedin',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Instagram URL', 'reveal' ),
                'desc'  => 'Enter Instagram URL',
                'id'    => $prefix . 'team_ig',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),


        )
    );

    $meta_boxes[] = array(
        'id'         => 'reveal-testimonail-meta',
        'title'      => __( 'Author Information', 'reveal' ),
        'post_types' => array( 'testimonial' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => __( 'Name', 'reveal' ),
                'desc'  => 'Enter Name',
                'id'    => $prefix . 'author_name',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Designation', 'reveal' ),
                'desc'  => 'Enter Designation',
                'id'    => $prefix . 'author_designation',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),


        )
    );


    $meta_boxes[] = array(
        'id'         => 'reveal-portfolio-meta',
        'title'      => __( 'Portfolio Information', 'reveal' ),
        'post_types' => array( 'portfolio' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'  => __( 'Client Name', 'reveal' ),
                'desc'  => 'Enter client name',
                'id'    => $prefix . 'portfolio_client',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Project Date', 'reveal' ),
                'desc'  => 'Enter project date. Example: 14-Apr-17',
                'id'    => $prefix . 'portfolio_date',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Project Skills', 'reveal' ),
                'desc'  => 'Enter project skills',
                'id'    => $prefix . 'portfolio_skills',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),


            array(
                'name'  => __( 'Project Site Name', 'reveal' ),
                'desc'  => 'Enter project site name',
                'id'    => $prefix . 'portfolio_sname',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),

            array(
                'name'  => __( 'Project Site URL', 'reveal' ),
                'desc'  => 'Enter project site URL',
                'id'    => $prefix . 'portfolio_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),




        )
    );

    $meta_boxes[] = array(
        'id'         => 'reveal-page-background-meta',
        'title'      => __( 'Page Header Background Image', 'reveal' ),
        'post_types' => array( 'page' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(

            array(
                'name'          => __( 'Background Image', 'reveal' ),
                'desc'          => 'Upload Page Header Background Image',
                'id'            => $prefix . 'page_background',
                'type'          => 'image_advanced',
                'clone'         => false,
            ),
        )
    );



    $meta_boxes[] = array(
        'id'         => 'reveal-client-logo-meta',
        'title'      => __( 'Client Information', 'reveal' ),
        'post_types' => array( 'clients' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(


            array(
                'name'  => __( 'Client Site URL', 'reveal' ),
                'desc'  => 'Enter client site URL',
                'id'    => $prefix . 'clients_surl',
                'type'  => 'text',
                'clone' => false,
                'size'  => 100
            ),



        )
    );

    return $meta_boxes;
}

