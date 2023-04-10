import React from "react";
import { Container, Row, Col } from "react-bootstrap";
import styled from "styled-components";
import { Link } from "react-router-dom";
import Avatar from "./Avatar";

const Header = () => {
    return (
        <Wrapper>
            <Container>
                <Row>
                    <Col>
                        <div className="d-flex justify-content-between align-items-center gap-2">
                            <Link to="/" className="fs-2 fw-bold d-flex flex-column align-items-center">
                                <Highlight>Vehicle</Highlight>
                                <span className="fs-3 fw-normal">Rental System</span>
                            </Link>
                            <Avatar />
                        </div>
                    </Col>
                </Row>
            </Container>
        </Wrapper>
    );
};

const Wrapper = styled.header`
    display: block;
    padding: 15px 0;
    box-shadow: 0 0 1.5rem rgba(0 0 0 / 10%);
`;
const Highlight = styled.span`
    font-size: var(--fs-h2);
    text-transform: uppercase;
`;

export default Header;
